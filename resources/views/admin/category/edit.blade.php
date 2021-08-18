@extends('layouts.admin')

@section('title', 'Edit Catagory')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Edit Catagory</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('category.update',$categories->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="Catagory Name">Catagory Name</label>
                    		<input class="form-control" id="name" type="text" name="name" value="{{ $categories->name }}">
                    		{!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
						</div>

						<div class="form-group col-md-6">
							<label for="Catagory Slug">Catagory Slug</label>
                    		<input class="form-control" id="slug" type="text" name="slug" value="{{ $categories->slug }}">
                    		{!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
						</div>

						<div class="form-group col-md-12">
		                    <label for="Catagory Description">Catagory Description</label>
		                    <textarea class="form-control" name="description">{{ $categories->description }}</textarea>
		                    {!! $errors->first('description', '<small class="text-danger">:message</small>') !!}
		                </div>

		                <div class="form-group col-md-6">
		                    <label for="Image">Catagory Image <small>( Leave Blank if don't )</small></label>
		                    <div class="custom-file">
		                        <input class="custom-file-input" type="file" name="image" data-toggle="custom-file-input">
		                        <label class="custom-file-label" for="example-file-input-custom">Choose Catagory Image</label>
		                        {!! $errors->first('image', '<small class="text-danger">:message</small>') !!}
		                    </div>
		                </div>

		                <div class="form-group col-md-6">
		                    @if(!empty($categories->image))
		                        <img src="{{asset('Uploads/Category').'/'.$categories->image}}"  width="100px">
		                    @else
		                        <img src="{{asset('backend/images/no-image.gif')}}"  width="100px">
		                    @endif
		                    <input type="hidden" class="form-control" name="old_image" value="{{ $categories->image }}">
		                </div>	

		                <div class="form-group col-md-6">
		                    <label for="Parent Category">Select Parent Category <small>( Leave Blank if Main Category )</small></label>
		                    <select class="form-control" name="parent_id">
		                        <option value="">Select Parent Category</option>
		                        @foreach ($parent_categories as $category)
		                            @if($category->parent == null)
		                                <option value="{{ $category->id }}" {{ $category->id === $categories->parent_id ? 'selected' : '' }}>{{ $category->name }}</option>
		                            @endif
		                        @endforeach
		                    </select>
		                </div>

		                <div class="form-group col-md-6">
		                    <label for="Page Gallary">Meta Name</label>
		                    <input class="form-control" type="text" name="meta_name" value="{{ $categories->meta_name }}">
		                    {!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
		                </div>

		                <div class="form-group col-md-12">
		                    <label for="Meta Keyword">Meta Keyword</label>
		                    <textarea class="form-control" name="meta_keyword">{{ $categories->meta_keyword }}</textarea>
		                    {!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
		                </div>

		                <div class="form-group col-md-12">
		                    <label for="Meta Description">Meta Description</label>
		                    <textarea class="form-control" name="meta_description">{{ $categories->meta_description }}</textarea>
		                    {!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
		                </div>
		                
		                <div class="form-group col-12">
			                <button type="submit" class="btn btn-primary">Submit</button>
			            </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop