@extends('layouts.admin')

@section('title', 'Main Menu List')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Main Menu List</h4> </div>
				<div class="card-body">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenu">Add New Menu</button> 
					<div class="table-responsive mt-4">
						<table class="table table-borderless" id="table-1">
							<thead >
			                    <tr>
			                        <th>#</th>
			                        <th>Menu Id</th>
			                        <th>Menu Title</th>
			                        <th>Menu Heading</th>
			                        <th>Status</th>
			                        <th>Date Created</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	<?php $index = 0; foreach ( $menus as $menu ){ $index++; ?>
			                    	<tr>
			                            <td class="text-center"><?php echo $index; ?></td>
			                            <td>{{ $menu->id }}</td>
			                            <td>{{ $menu->title }}</td>
			                            <td>{{ $menu->heading }}</td>
			                            <td>{{ $menu->status ? 'Yes' : 'No' }}</td>
			                            <td>{{ $menu->created_at }}</td>
			                            <td>
			                                <a type="button" class="editMenuModal" data-toggle="modal" data-target="#editMenu" data-id="{{ $menu->id }}" data-title="{{ $menu->title }}" data-heading="{{ $menu->heading }}" data-status="{{ $menu->status }}"> 
			                                	<i class="text-warning" data-feather="edit-2"></i> 
			                                </a>  

			                                <a href="{{url('/admin/menu-builder/delete/'.$menu->id)}}" onclick="return confirm('Are you sure you want to delete')"> 
			                                    <i class="text-danger" data-feather="trash"></i>
			                                </a> 

			                                <a href="{{route('menu-builder.show', $menu->id)}}"> 
			                                	<i class="text-success" data-feather="eye"></i> 
			                                </a>
			                            </td>   
			                        </tr>
			                	<?php } ?> 
			                </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts')
<!-- Add Menu Modal Start -->
<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formModal">Add Menu Type</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('menu-builder.store') }}" method="POST">
					@csrf
					<div class="form-group">
						<label>Menu Name</label>
						<div class="input-group">
							<input type="text" class="form-control" id="Menu-Name" name="title" value="{{old('title')}}" required="">
						</div>
					</div>
					<div class="form-group">
						<label>Menu Heading</label>
						<div class="input-group">
							<input type="text" class="form-control" id="Menu-Heading" name="heading" value="{{old('heading')}}" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="custom-switches-stacked mt-2">
							<label class="custom-switch">
								<input type="checkbox" class="custom-switch-input" name="status" value="1" checked>
								<span class="custom-switch-indicator"></span>
								<span class="custom-switch-description">Status</span>
							</label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary m-t-15 waves-effect">Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Add Menu Modal End -->

<script>
	$(document).ready(function() {
		$('.editMenuModal').click(function() {
			var id=$(this).data('id');
			var title=$(this).data('title');
			var heading=$(this).data('heading');
			var status=$(this).data('status');
			$('#m_name').val(title);
			$('#m_heading').val(heading);
			$('#m_status').val(status);
			$('#m_id').val(id);
			if (status == 1) {
				$('#m_status').attr("checked", true);
			} 
			else {
				$('#m_status').attr("checked", false);
			}
		});

		$('#edit_menu_type').on('submit', function(e) {
			e.preventDefault();
			var baseUrl = '{{ URL::to('/') }}';
			var new_name = $('#m_name').val();
			var new_heading = $('#m_heading').val();
			var new_status = $('#m_status:checked').val();
			var new_id = $('#m_id').val();
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url : "{{ route('menu-builder.update') }}",
				type:'post',
				data : { _token : csrfToken, id : new_id, title : new_name, heading : new_heading, status : new_status},
				success:function(html){
					var result = JSON.parse(html);
					if(result.statusCode == 200){ 
						alert('Menu Type Updated Successfully!');
						window.location.href = "menu-builder";
					} 
					else {
						alert('Something went wrong please check the form!');
					}
				},
			});
		});
	});
</script>

<!-- Edit Menu Modal Start -->
<div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="editMenuModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editMenuModal">Edit Menu Type</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="edit_menu_type">
					<div class="form-group">
						<label>Menu Name</label>
						<div class="input-group">
							<input type="text" class="form-control" id="m_name" name="title" value="{{old('title')}}" required="">
						</div>
					</div>
					<div class="form-group">
						<label>Menu Heading</label>
						<div class="input-group">
							<input type="text" class="form-control" id="m_heading" name="heading" value="{{old('heading')}}" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="custom-switches-stacked mt-2">
							<label class="custom-switch">
								<input type="checkbox" class="custom-switch-input" id="m_status" name="status" value="1">
								<span class="custom-switch-indicator"></span>
								<span class="custom-switch-description">Status</span>
							</label>
						</div>
					</div>
					<input type="hidden" name="menu_id" id="m_id" value="">
					<button type="submit" id="" class="btn btn-primary m-t-15 waves-effect">Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Edit Menu Modal End -->
@stop