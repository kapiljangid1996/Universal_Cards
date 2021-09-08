@extends('layouts.admin')

@section('title', 'Edit Site Settings')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Edit Site Settings</h4> </div>
				<div class="card-body">
					<form action="{{url('/admin/site-setting/'.$sites[0]->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="Site Title">Site Title</label>
								<input class="form-control" type="text" name="title" value="{{ $sites[0]->title }}">
	                            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Site Slogan">Site Slogan</label>
								<input class="form-control" type="text" name="slogan" value="{{ $sites[0]->slogan }}">
	                            {!! $errors->first('slogan', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Site Logo">Site Logo</label>
								<input class="form-control" type="file" name="logo">
								<input type="hidden" name="old_logo" value="{{ $sites[0]->logo }}">
	                            {!! $errors->first('logo', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								@if(!empty($sites[0]->image))
	                            	<img src="{{asset('Uploads/Site').'/'.$sites[0]->logo}}"  width="100px">
		                        @else
		                            <img src="{{asset('backend/images/no-image.gif')}}"  width="100px">
		                        @endif
							</div>
							<div class="form-group col-md-6">
								<label for="Phone Number">Phone Number</label>
		                		<input class="form-control" type="text" name="phone_number" value="{{ $sites[0]->phone_number }}">
	                        	{!! $errors->first('phone_number', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Email Address">Email Address</label>
		                		<input class="form-control" type="email" name="email_address" value="{{ $sites[0]->email_address }}">
	                        	{!! $errors->first('email_address', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Address">Address</label>
		                		<textarea class="form-control" name="address">{{ $sites[0]->address }}</textarea>
	                        	{!! $errors->first('address', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Facebook Link">Facebook Link</label>
		                		<input class="form-control" type="text" name="facebook" value="{{ $sites[0]->facebook }}">
	                        	{!! $errors->first('facebook', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Twitter Link">Twitter Link</label>
		                		<input class="form-control" type="text" name="twitter" value="{{ $sites[0]->twitter }}">
	                        	{!! $errors->first('twitter', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Instagram Link">Instagram Link</label>
		                		<input class="form-control" type="text" name="instagram" value="{{ $sites[0]->instagram }}">
	                        	{!! $errors->first('instagram', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Youtube Link">Youtube Link</label>
		                		<input class="form-control" type="text" name="youtube" value="{{ $sites[0]->youtube }}">
	                        	{!! $errors->first('youtube', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Footer About Text">Footer About Text</label>
		                		<textarea class="form-control" name="footer_about">{{ $sites[0]->footer_about }}</textarea>
	                        	{!! $errors->first('footer_about', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Footer Text">Footer Text</label>
		                		<textarea class="form-control" name="footer_text">{{ $sites[0]->footer_text }}</textarea>
	                        	{!! $errors->first('footer_text', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-6">
								<label for="Meta Name">Meta Name</label>
		                		<input class="form-control" type="text" name="meta_name" value="{{ $sites[0]->meta_name }}">
	                        	{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Meta Keyword">Meta Keyword</label>
		                		<textarea class="form-control" name="meta_keyword">{{ $sites[0]->meta_keyword }}</textarea>
	                        	{!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Meta Description">Meta Description</label>
		                		<textarea class="form-control" name="meta_description">{{ $sites[0]->meta_description }}</textarea>
	                        	{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
							</div>
							<div class="form-group col-md-12">
								<label for="Google Analyst">Google Analyst</label>
		                		<textarea class="form-control" name="google_analyst">{{ $sites[0]->google_analyst }}</textarea>
	                        	{!! $errors->first('google_analyst', '<small class="text-danger">:message</small>') !!}
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
    CKEDITOR.replace( 'google_analyst' );
</script>
@stop