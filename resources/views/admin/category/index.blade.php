@extends('layouts.admin')

@section('title', 'Cards Categories')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Category List</h4> </div>
				<div class="card-body">
					<a class="btn btn-primary" href="{{route('category.create')}}">Add New Category</a>
					<div class="table-responsive mt-4">
						<table class="table table-borderless" id="table-1">
							<thead >
			                    <tr>
			                        <th>#</th>
			                        <th>Category Name</th>
			                        <th>Category Slug</th>
			                        <th>Parent Category</th>
			                        <th>Image</th>
			                        <th>Date Created</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	<?php $index = 0; foreach ( $categories as $category ){ $index++; ?>
			                    	<tr>
			                            <td class="text-center"><?php echo $index; ?></td>
			                            <td>{{ $category->name }}</td>
			                            <td>{{ $category->slug }}</td>
			                            <td>{{ $category->parent ? $category->parent->name : 'No Parent Category'}}</td>
			                            <td>
			                                @if(!empty($category->image))
			                                    <img src="{{asset('Uploads/Category/').'/'.$category->image}}"  width="80px">
			                                @else
			                                    <img src="{{asset('backend/images/no-image.gif')}}"  width="80px">
			                                @endif
			                            </td>
			                            <td>{{ $category->created_at }}</td>
			                            <td class="text-center">
			                                <a href="{{route('category.edit', $category->id)}}"> <i class="text-warning" data-feather="edit-2"></i> </a> 
			                                &nbsp;&nbsp;                                    
			                                <a href="{{url('/admin/category/delete/'.$category->id)}}" onclick="return confirm('Are you sure you want to delete')"> 
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