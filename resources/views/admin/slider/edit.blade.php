@extends('layouts.admin')

@section('title', 'Edit Slide')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Edit Slide</h4> </div>
				<div class="card-body">
					<form action="{{ route('sliders.update',$sliders->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="Slide Title">Slide Title</label>
								<input class="form-control" id="name" type="text" name="title" value="{{$sliders->title}}">
	                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Slide Slug">Slide Slug</label>
								<input class="form-control" id="slug" type="text" name="slug" value="{{$sliders->slug}}">
	                            {!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Slide Image">Slide Image</label>
								<input class="form-control" type="file" name="image">
								<input type="hidden" name="old_image" value="{{$sliders->image}}">
	                            {!! $errors->first('image', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								@if(!empty($sliders->image))
	                            	<img src="{{asset('Uploads/Slider').'/'.$sliders->image}}"  width="100px">
		                        @else
		                            <img src="{{asset('backend/images/no-image.gif')}}"  width="100px">
		                        @endif
							</div>
							<div class="form-group col-md-6">
								<label for="Caption">Caption</label>
		                		<input class="form-control" type="text" name="caption" value="{{$sliders->caption}}">
	                        	{!! $errors->first('caption', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Caption Color">Caption Color</label>
								<input class="form-control" type="color" name="captioncolorpick" value="{{$sliders->captioncolorpick}}">
							</div>
							<div class="form-group col-md-6">
								<label for="Button Text">Button Text</label>
		                		<input class="form-control" type="text" name="button_text" value="{{$sliders->button_text}}">
	                        	{!! $errors->first('button_text', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Button Color">Button Color</label>
								<input class="form-control" type="color" name="btncolorpick" value="{{$sliders->btncolorpick}}">
							</div>
							<div class="form-group col-md-6">
								<label for="Button Url">Button Url</label>
		                		<input class="form-control" type="text" name="button_url" value="{{$sliders->button_url}}">
	                        	{!! $errors->first('button_url', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Meta Name">Meta Name</label>
		                		<input class="form-control" type="text" name="meta_name" value="{{$sliders->meta_name}}">
	                        	{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Meta Keyword">Meta Keyword</label>
		                		<textarea class="form-control" name="meta_keyword">{{$sliders->meta_keyword}}</textarea>
	                        	{!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Meta Description">Meta Description</label>
		                		<textarea class="form-control" name="meta_description">{{$sliders->meta_description}}</textarea>
	                        	{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Sort Order">Sort Order</label>
		                		<input class="form-control" type="number" name="sort_order" pattern="[0-9]" min="0" value="{{$sliders->sort_order}}" oninput="validity.valid||(value='');">
	                        	{!! $errors->first('sort_order', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox">
	                            <input id="gridCheck" type="checkbox" name="status" value="1" @if(old('status', $sliders->status)) checked @endif>
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