@extends('layouts.admin')

@section('title', 'Blogs')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Blogs</h4> </div>
				<div class="card-body">
					<a class="btn btn-primary" href="{{route('blogs.create')}}">Add New Blog</a>
					<div class="table-responsive mt-4">
						<table class="table table-borderless" id="table-1">
							<thead >
			                    <tr>
			                        <th>#</th>
	                                <th>Author</th>
	                                <th>Image</th>
	                                <th>Sort Order</th>
	                                <th>Status</th>
	                                <th>Date Created</th>
	                                <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	<?php $index = 0; foreach ( $blogs as $blog ){ $index++; ?>
			                    	<tr>
			                            <td class="text-center"><?php echo $index; ?></td>	                            
		                                <td>{{ $blog->author }}</td>
		                                <td>
		                                    @if(!empty($blog->image))
		                                        <img src="{{asset('Uploads/Blog/').'/'.$blog->image}}"  width="80px">
		                                    @else
		                                        <img src="{{asset('backend/images/no-image.gif')}}"  width="80px">
		                                    @endif
		                                </td>
		                                <td>{{ $blog->sort_order }}</td>
		                                <td>{{ $blog->status ? 'Active' : 'Inactive'}}</td>
		                                <td>{{ $blog->created_at }}</td>
			                            <td>
			                                <a href="{{route('blogs.edit', $blog->id)}}"> 
			                                	<i class="text-warning" data-feather="edit-2"></i> 
			                                </a>  

			                                <a href="{{url('/admin/blogs/delete/'.$blog->id)}}" onclick="return confirm('Are you sure you want to delete')"> 
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