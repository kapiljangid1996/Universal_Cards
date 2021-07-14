@extends('layouts.admin')

@section('title', 'Sliders')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Sliders</h4> </div>
				<div class="card-body">
					<a class="btn btn-primary" href="{{route('sliders.create')}}">Add New Slide</a>
					<div class="table-responsive mt-4">
						<table class="table table-borderless" id="table-1">
							<thead >
			                    <tr>
			                        <th>#</th>
	                                <th>Title</th>
	                                <th>Slug</th>
	                                <th>Image</th>
	                                <th>Sort Order</th>
	                                <th>Status</th>
	                                <th>Date Created</th>
	                                <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	<?php $index = 0; foreach ( $sliders as $slider ){ $index++; ?>
			                    	<tr>
			                            <td class="text-center"><?php echo $index; ?></td>	                            
		                                <td>{{ $slider->title }}</td>
		                                <td>{{ $slider->slug }}</td>
		                                <td>
		                                    @if(!empty($slider->image))
		                                        <img src="{{asset('Uploads/Slider/').'/'.$slider->image}}"  width="80px">
		                                    @else
		                                        <img src="{{asset('backend/images/no-image.gif')}}"  width="80px">
		                                    @endif
		                                </td>
		                                <td>{{ $slider->sort_order }}</td>
		                                <td>{{ $slider->status ? 'Active' : 'Inactive'}}</td>
		                                <td>{{ $slider->created_at }}</td>
			                            <td>
			                                <a href="{{route('sliders.edit', $slider->id)}}"> 
			                                	<i class="text-warning" data-feather="edit-2"></i> 
			                                </a>  

			                                <a href="{{url('/admin/sliders/delete/'.$slider->id)}}" onclick="return confirm('Are you sure you want to delete')"> 
			                                    <i class="text-danger" data-feather="trash"></i>
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