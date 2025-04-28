<!DOCTYPE html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light"
	data-sidebar-image="none" data-preloader="disable">

<head>
	<meta charset="utf-8" />
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- App favicon -->
	{{--
	<link rel="shortcut icon" href="assets/images/favicon.ico" /> --}}
	<link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

	{{-- @vite(['resources/js/app.js']) --}}
	<!-- Layout config Js -->
	<script src="{{ asset('themes/js/layout.js') }}"></script>
	<!-- Bootstrap Css -->
	<link href="{{ asset('themes/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="{{ asset('themes/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="{{ asset('themes/css/app.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- custom Css-->
	<link href="{{ asset('themes/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
	@livewireStyles
</head>

<body>
	<!-- Begin page -->
	<div id="layout-wrapper">
		{{-- Header --}}
		@include('layouts.partials.header')
		{{-- End Header --}}

		{{-- App Menu --}}
		@include('layouts.partials.sidebar')
		{{-- End App Menu --}}

		<!-- Vertical Overlay-->
		<div class="vertical-overlay"></div>

		<div class="main-content">
			{{-- Content --}}
			<div class="page-content">
				<!-- container-fluid -->
				<div class="container-fluid">
					{{-- page title --}}
					@include('layouts.partials.breadcrumb')
					{{-- end page title / breadcrum --}}

					@yield('content')
				</div>
			</div>
			{{-- End Content --}}

			{{-- Footer --}}
			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<script>
								document.write(new Date().getFullYear());
							</script>
							© SMP.
						</div>
						<div class="col-sm-6">
							<div class="text-sm-end d-none d-sm-block">
								Megono POS Team
							</div>
						</div>
					</div>
				</div>
			</footer>
			{{-- End Footer --}}
		</div>

	</div>

	<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
		<i class="ri-arrow-up-line"></i>
	</button>
	<!--end back-to-top-->

	<!--preloader-->
	<div id="preloader">
		<div id="status">
			<div class="spinner-border text-primary avatar-sm" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div>
	</div>

	{{-- <div class="customizer-setting d-none d-md-block">
		<div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
			data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
			<i class="mdi mdi-spin mdi-cog-outline fs-22"></i>
		</div>
	</div> --}}

	<!-- Theme Settings -->
	{{-- @include('layouts.partials.themes') --}}


	<!-- JAVASCRIPT -->
	<script src="{{ asset('themes/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	{{-- <script src="{{ asset('themes/libs/simplebar/simplebar.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('themes/libs/node-waves/waves.min.js') }}"></script> --}}
	<script src="{{ asset('themes/libs/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('themes/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
	{{-- <script src="{{ asset('themes/js/plugins.js') }}"></script> --}}

	<!-- apexcharts -->
	{{-- <script src="{{ asset('themes/libs/apexcharts/apexcharts.min.js')  }}">
		--}}
	</script>

	<!-- projects js -->
	{{-- <script src="{{ asset('themes/js/pages/dashboard-projects.init.js') }}"></script> --}}

	<!-- App js -->
	{{-- <script src="{{ asset('themes/js/app.js') }}"></script> --}}
</body>

</html>