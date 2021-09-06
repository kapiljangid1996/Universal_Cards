@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Testimonials</h4> </div>
				<div class="card-body">
					<a class="btn btn-primary" href="{{route('testimonials.create')}}">Add New Testimonial</a>
					<div class="table-responsive mt-4">
						<table class="table table-borderless" id="table-1">
							<thead >
			                    <tr>
			                        <th>#</th>
	                                <th>Author</th>
	                                <th>Rating</th>
	                                <th>Image</th>
	                                <th>Sort Order</th>
	                                <th>Status</th>
	                                <th>Date Created</th>
	                                <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	<?php $index = 0; foreach ( $testimonials as $testimonial ){ $index++; ?>
			                    	<tr>
			                            <td class="text-center"><?php echo $index; ?></td>	                            
		                                <td>{{ $testimonial->author }}</td>
		                                <td>{{ $testimonial->rating }}</td>
		                                <td>
		                                    @if(!empty($testimonial->image))
		                                        <img src="{{asset('Uploads/Testimonial/').'/'.$testimonial->image}}"  width="80px">
		                                    @else
		                                        <img src="{{asset('backend/images/no-image.gif')}}"  width="80px">
		                                    @endif
		                                </td>
		                                <td>{{ $testimonial->sort_order }}</td>
		                                <td>{{ $testimonial->status ? 'Active' : 'Inactive'}}</td>
		                                <td>{{ $testimonial->created_at }}</td>
			                            <td>
			                                <a href="{{route('testimonials.edit', $testimonial->id)}}"> 
			                                	<i class="text-warning" data-feather="edit-2"></i> 
			                                </a>  

			                                <a href="{{url('/admin/testimonials/delete/'.$testimonial->id)}}" onclick="return confirm('Are you sure you want to delete')"> 
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