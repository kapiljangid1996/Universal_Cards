@extends('layouts.admin')

@section('title', 'Edit Site Settings')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Edit Site Settings</h4> </div>
				<div class="card-body">
					<form action="{{ route('sites.update',$sites->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="Author">Author</label>
								<input class="form-control" type="text" name="author" value="{{ $blogs->author }}">
	                            {!! $errors->first('author', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6"></div>
							<div class="form-group col-md-6">
								<label for="Blog Image">Blog Image</label>
								<input class="form-control" type="file" name="image">
								<input type="hidden" name="old_image" value="{{ $blogs->image }}">
	                            {!! $errors->first('image', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								@if(!empty($blogs->image))
	                            	<img src="{{asset('Uploads/Blog').'/'.$blogs->image}}"  width="100px">
		                        @else
		                            <img src="{{asset('backend/images/no-image.gif')}}"  width="100px">
		                        @endif
							</div>
							<div class="form-group col-md-12">
								<label for="Description">Description</label>
		                		<textarea class="form-control" name="description">{{ $blogs->description }}</textarea>
	                        	{!! $errors->first('description', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Meta Name">Meta Name</label>
		                		<input class="form-control" type="text" name="meta_name" value="{{ $blogs->meta_name }}">
	                        	{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Meta Keyword">Meta Keyword</label>
		                		<textarea class="form-control" name="meta_keyword">{{ $blogs->meta_keyword }}</textarea>
	                        	{!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Meta Description">Meta Description</label>
		                		<textarea class="form-control" name="meta_description">{{ $blogs->meta_description }}</textarea>
	                        	{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Sort Order">Sort Order</label>
		                		<input class="form-control" type="number" name="sort_order" pattern="[0-9]" min="0" value="{{ $blogs->sort_order }}" oninput="validity.valid||(value='');">
	                        	{!! $errors->first('sort_order', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox">
	                            <input id="gridCheck" type="checkbox" name="status" value="1" @if(old('status', $blogs->status)) checked @endif>
	                            <label for="gridCheck">Status</label>
	                        </div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'description' );
</script>
@stop