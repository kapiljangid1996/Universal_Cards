@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><h4>Dashboard</h4></div>
				<div class="card-body">
					<h4 class="h4">
                        <span>Hi,&nbsp; <b class="text-uppercase text-info"> {{ Auth::user()->name }}</b>&nbsp; Welcome Back! &nbsp;<b class="text-uppercase text-warning pull-right">{{ \Carbon\Carbon::now('Asia/Kolkata')->toDayDateTimeString() }} </b></span>
                    </h4>
				</div>
			</div>
		</div>
	</div>
</div>
@stop