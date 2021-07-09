<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

		<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />

		<title>@yield('title')</title>

		<!-- General CSS Files -->
		<link rel="stylesheet" href="{{ asset('backend/css/app.min.css')}}">

		<link rel="stylesheet" href="{{ asset('backend/bundles/prism/prism.css')}}">

  		<link rel="stylesheet" href="{{ asset('backend/bundles/datatables/datatables.min.css')}}">

  		<link rel="stylesheet" href="{{ asset('backend/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

		<!-- Template CSS -->
		<link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">

		<link rel="stylesheet" href="{{ asset('backend/css/components.css')}}">

		<!-- Custom style CSS -->
		<link rel="stylesheet" href="{{ asset('backend/css/custom.css')}}">

		<link rel='shortcut icon' type='image/x-icon' href="{{ asset('backend/img/favicon.ico')}}" />

		<!-- Extra Css or Style -->
    	@yield('style')
	</head>

	<body>
		<div class="loader"></div>
		<div id="app">
			<div class="main-wrapper main-wrapper-1">
				<!-- Header Start -->
				@include('components.admin-header')
				<!-- Header End -->

				<!-- Sidebar Start -->
				@include('components.admin-sidebar')
				<!-- Sidebar End -->

				<!-- Main Content Start -->
				<div class="main-content">
					<section class="section">
						<!-- Sweetalert -->
		                @include('sweetalert::alert')
		                <!-- End Sweetalert -->

		                <!-- Content -->
		                @yield('content')
		                <!-- End Content -->
					</section>
				</div>
				<!-- Main Content End -->
			</div>

			<input type="hidden" id="base_url" name="base_url" value="{{ URL::to('/') }}">
			<input type="hidden" id="baseUrl" name="base_url" value="{{ URL::to('/') }}">
		</div>

		<!-- General JS Scripts -->
		<script src="{{ asset('backend/js/app.min.js')}}"></script>

		<!-- JS Libraies -->

		<script src="{{ asset('backend/bundles/datatables/datatables.min.js')}}"></script>

		<script src="{{ asset('backend/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>

		<script src="{{ asset('backend/bundles/jquery-ui/jquery-ui.min.js')}}"></script>

		<script src="{{ asset('backend/bundles/prism/prism.js')}}"></script>

		<!-- Page Specific JS File -->
		<script src="{{ asset('backend/js/page/datatables.js')}}"></script>

		<!-- Template JS File -->
		<script src="{{ asset('backend/js/scripts.js')}}"></script>

		<!-- Custom JS File -->
		<script src="{{ asset('backend/js/custom.js')}}"></script>

		<!-- Extra Scripts -->
    	@yield('scripts')
	</body>
</html>