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
	<link rel="shortcut icon" href="assets/images/favicon.ico" />

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
				@yield('content')
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

	<div class="customizer-setting d-none d-md-block">
		<div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
			data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
			<i class="mdi mdi-spin mdi-cog-outline fs-22"></i>
		</div>
	</div>

	<!-- Theme Settings -->
	<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
		<div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
			<h5 class="m-0 me-2 text-white">Theme Customizer</h5>

			<button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn"
				data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body p-0">
			<div data-simplebar class="h-100">
				<div class="p-4">
					<h6 class="mb-0 fw-bold text-uppercase">Layout</h6>
					<p class="text-muted">Choose your layout</p>

					<div class="row gy-3">
						<div class="col-4">
							<div class="form-check card-radio">
								<input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
									class="form-check-input" />
								<label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Vertical</h5>
						</div>
						<div class="col-4">
							<div class="form-check card-radio">
								<input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
									class="form-check-input" />
								<label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
									<span class="d-flex h-100 flex-column gap-1">
										<span class="bg-light d-flex p-1 gap-1 align-items-center">
											<span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
											<span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
											<span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
										</span>
										<span class="bg-light d-block p-1"></span>
										<span class="bg-light d-block p-1 mt-auto"></span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">
								Horizontal
							</h5>
						</div>
						<div class="col-4">
							<div class="form-check card-radio">
								<input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn"
									class="form-check-input" />
								<label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1">
												<span class="d-block p-1 bg-primary-subtle mb-2"></span>
												<span class="d-block p-1 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 pb-0 bg-primary-subtle"></span>
											</span>
										</span>
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">
								Two Column
							</h5>
						</div>
						<!-- end col -->

						<div class="col-4">
							<div class="form-check card-radio">
								<input id="customizer-layout04" name="data-layout" type="radio" value="semibox"
									class="form-check-input" />
								<label class="form-check-label p-0 avatar-md w-100" for="customizer-layout04">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0 p-1">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column pt-1 pe-2">
												<span class="bg-light d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Semi Box</h5>
						</div>
						<!-- end col -->
					</div>

					<h6 class="mt-4 mb-0 fw-bold text-uppercase">
						Color Scheme
					</h6>
					<p class="text-muted">Choose Light or Dark Scheme.</p>

					<div class="colorscheme-cardradio">
						<div class="row">
							<div class="col-4">
								<div class="form-check card-radio">
									<input class="form-check-input" type="radio" name="data-bs-theme"
										id="layout-mode-light" value="light" />
									<label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span
														class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
													<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
													<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">
									Light
								</h5>
							</div>

							<div class="col-4">
								<div class="form-check card-radio dark">
									<input class="form-check-input" type="radio" name="data-bs-theme"
										id="layout-mode-dark" value="dark" />
									<label class="form-check-label p-0 avatar-md w-100 bg-dark" for="layout-mode-dark">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-white bg-opacity-10 d-flex h-100 flex-column gap-1 p-1">
													<span
														class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
													<span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
													<span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-white bg-opacity-10 d-block p-1"></span>
													<span class="bg-white bg-opacity-10 d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">Dark</h5>
							</div>
						</div>
					</div>

					<div id="layout-width">
						<h6 class="mt-4 mb-0 fw-bold text-uppercase">
							Layout Width
						</h6>
						<p class="text-muted">
							Choose Fluid or Boxed layout.
						</p>

						<div class="row">
							<div class="col-4">
								<div class="form-check card-radio">
									<input class="form-check-input" type="radio" name="data-layout-width"
										id="layout-width-fluid" value="fluid" />
									<label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
										<span class="d-flex gap-1 h-100">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span
														class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
													<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
													<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">
									Fluid
								</h5>
							</div>
							<div class="col-4">
								<div class="form-check card-radio">
									<input class="form-check-input" type="radio" name="data-layout-width"
										id="layout-width-boxed" value="boxed" />
									<label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-width-boxed">
										<span class="d-flex gap-1 h-100 border-start border-end">
											<span class="flex-shrink-0">
												<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
													<span
														class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
													<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
													<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
													<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												</span>
											</span>
											<span class="flex-grow-1">
												<span class="d-flex h-100 flex-column">
													<span class="bg-light d-block p-1"></span>
													<span class="bg-light d-block p-1 mt-auto"></span>
												</span>
											</span>
										</span>
									</label>
								</div>
								<h5 class="fs-13 text-center mt-2">
									Boxed
								</h5>
							</div>
						</div>
					</div>

					<h6 class="mt-4 mb-0 fw-bold text-uppercase">
						Topbar Color
					</h6>
					<p class="text-muted">
						Choose Light or Dark Topbar Color.
					</p>

					<div class="row">
						<div class="col-4">
							<div class="form-check card-radio">
								<input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-light"
									value="light" />
								<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-light d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Light</h5>
						</div>
						<div class="col-4">
							<div class="form-check card-radio">
								<input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-dark"
									value="dark" />
								<label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
									<span class="d-flex gap-1 h-100">
										<span class="flex-shrink-0">
											<span class="bg-light d-flex h-100 flex-column gap-1 p-1">
												<span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
												<span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
											</span>
										</span>
										<span class="flex-grow-1">
											<span class="d-flex h-100 flex-column">
												<span class="bg-primary d-block p-1"></span>
												<span class="bg-light d-block p-1 mt-auto"></span>
											</span>
										</span>
									</span>
								</label>
							</div>
							<h5 class="fs-13 text-center mt-2">Dark</h5>
						</div>
					</div>


					<div id="sidebar-img">
						<h6 class="mt-4 mb-0 fw-bold text-uppercase">
							Sidebar Images
						</h6>
						<p class="text-muted">Choose a image of Sidebar.</p>

						<div class="d-flex gap-2 flex-wrap img-switch">
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image"
									id="sidebarimg-none" value="none" />
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
									<span
										class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
										<i class="ri-close-fill fs-20"></i>
									</span>
								</label>
							</div>

							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image"
									id="sidebarimg-01" value="img-1" />
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
									<img src="{{ asset('themes/images/sidebar/img-1.jpg') }}" alt=""
										class="avatar-md w-auto object-fit-cover" />
								</label>
							</div>

							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image"
									id="sidebarimg-02" value="img-2" />
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
									<img src="{{ asset('themes/images/sidebar/img-2.jpg') }}" alt=""
										class="avatar-md w-auto object-fit-cover" />
								</label>
							</div>
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image"
									id="sidebarimg-03" value="img-3" />
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
									<img src="{{ asset('themes/images/sidebar/img-3.jpg') }}" alt=""
										class="avatar-md w-auto object-fit-cover" />
								</label>
							</div>
							<div class="form-check sidebar-setting card-radio">
								<input class="form-check-input" type="radio" name="data-sidebar-image"
									id="sidebarimg-04" value="img-4" />
								<label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
									<img src="{{ asset('themes/images/sidebar/img-4.jpg') }}" alt=""
										class="avatar-md w-auto object-fit-cover" />
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="offcanvas-footer border-top p-3 text-center">
			<div class="row">
				<div class="col-6">
					<button type="button" class="btn btn-light w-100" id="reset-layout">
						Reset
					</button>
				</div>
				<div class="col-6">
					<a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy
						Now</a>
				</div>
			</div>
		</div>
	</div>

	<!-- JAVASCRIPT -->
	<script src="{{ asset('themes/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('themes/libs/simplebar/simplebar.min.js') }}"></script>
	<script src="{{ asset('themes/libs/node-waves/waves.min.js') }}"></script>
	<script src="{{ asset('themes/libs/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('themes/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
	<script src="{{ asset('themes/js/plugins.js') }}"></script>

	<!-- apexcharts -->
	<script src="{{ asset('themes/libs/apexcharts/apexcharts.min.js')  }}">
	</script>

	<!-- projects js -->
	<script src="{{ asset('themes/js/pages/dashboard-projects.init.js') }}"></script>

	<!-- App js -->
	<script src="{{ asset('themes/js/app.js') }}"></script>
</body>

</html>