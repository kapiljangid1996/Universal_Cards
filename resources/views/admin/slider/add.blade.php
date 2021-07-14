@extends('layouts.admin')

@section('title', 'Add New Slide')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Add New Slide</h4> </div>
				<div class="card-body">
					<form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="Slide Title">Slide Title</label>
								<input class="form-control" id="name" type="text" name="title" value="{{old('title')}}">
	                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Slide Slug">Slide Slug</label>
								<input class="form-control" id="slug" type="text" name="slug" value="{{old('slug')}}">
	                            {!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Slide Image">Slide Image</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="customFile" name="image">
									<label class="custom-file-label" for="customFile">Choose Image</label>
								</div>
	                            {!! $errors->first('image', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Caption">Caption</label>
		                		<input class="form-control" type="text" name="caption" value="{{old('caption')}}">
	                        	{!! $errors->first('caption', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Button Text">Button Text</label>
		                		<input class="form-control" type="text" name="button_text" value="{{old('button_text')}}">
	                        	{!! $errors->first('button_text', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Button Url">Button Url</label>
		                		<input class="form-control" type="text" name="button_url" value="{{old('button_url')}}">
	                        	{!! $errors->first('button_url', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Meta Name">Meta Name</label>
		                		<input class="form-control" type="text" name="meta_name" value="{{old('meta_name')}}">
	                        	{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Meta Keyword">Meta Keyword</label>
		                		<textarea class="form-control" name="meta_keyword">{{old('meta_keyword')}}</textarea>
	                        	{!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Meta Description">Meta Description</label>
		                		<textarea class="form-control" name="meta_description">{{old('meta_description')}}</textarea>
	                        	{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Sort Order">Sort Order</label>
		                		<input class="form-control" type="number" name="sort_order" pattern="[0-9]" min="0" value="{{old('sort_order')}}" oninput="validity.valid||(value='');">
	                        	{!! $errors->first('sort_order', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox">
	                            <input id="gridCheck" type="checkbox" name="status" value="1">
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