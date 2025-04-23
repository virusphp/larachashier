@extends('layouts.admin')

@section('content')

<div class="container-fluid">
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0">Projects</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item">
							<a href="javascript: void(0);">Dashboards</a>
						</li>
						<li class="breadcrumb-item active">
							Projects
						</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row project-wrapper">
		<div class="col-xxl-8">
			<div class="row">
				<div class="col-xl-4">
					<div class="card card-animate">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="avatar-sm flex-shrink-0">
									<span class="avatar-title bg-primary-subtle text-primary rounded-2 fs-2">
										<i data-feather="briefcase" class="text-primary"></i>
									</span>
								</div>
								<div class="flex-grow-1 overflow-hidden ms-3">
									<p class="text-uppercase fw-medium text-muted text-truncate mb-3">
										Active Projects
									</p>
									<div class="d-flex align-items-center mb-3">
										<h4 class="fs-4 flex-grow-1 mb-0">
											<span class="counter-value" data-target="825">0</span>
										</h4>
										<span class="badge bg-danger-subtle text-danger fs-12"><i
												class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
											%</span>
									</div>
									<p class="text-muted text-truncate mb-0">
										Projects this month
									</p>
								</div>
							</div>
						</div>
						<!-- end card body -->
					</div>
				</div>
				<!-- end col -->

				<div class="col-xl-4">
					<div class="card card-animate">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="avatar-sm flex-shrink-0">
									<span class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
										<i data-feather="award" class="text-warning"></i>
									</span>
								</div>
								<div class="flex-grow-1 ms-3">
									<p class="text-uppercase fw-medium text-muted mb-3">
										New Leads
									</p>
									<div class="d-flex align-items-center mb-3">
										<h4 class="fs-4 flex-grow-1 mb-0">
											<span class="counter-value" data-target="7522">0</span>
										</h4>
										<span class="badge bg-success-subtle text-success fs-12"><i
												class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
											%</span>
									</div>
									<p class="text-muted mb-0">
										Leads this month
									</p>
								</div>
							</div>
						</div>
						<!-- end card body -->
					</div>
				</div>
				<!-- end col -->

				<div class="col-xl-4">
					<div class="card card-animate">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="avatar-sm flex-shrink-0">
									<span class="avatar-title bg-info-subtle text-info rounded-2 fs-2">
										<i data-feather="clock" class="text-info"></i>
									</span>
								</div>
								<div class="flex-grow-1 overflow-hidden ms-3">
									<p class="text-uppercase fw-medium text-muted text-truncate mb-3">
										Total Hours
									</p>
									<div class="d-flex align-items-center mb-3">
										<h4 class="fs-4 flex-grow-1 mb-0">
											<span class="counter-value" data-target="168">0</span>h
											<span class="counter-value" data-target="40">0</span>m
										</h4>
										<span class="badge bg-danger-subtle text-danger fs-12"><i
												class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>10.35
											%</span>
									</div>
									<p class="text-muted text-truncate mb-0">
										Work this month
									</p>
								</div>
							</div>
						</div>
						<!-- end card body -->
					</div>
				</div>
				<!-- end col -->
			</div>
			<!-- end row -->

		</div>
		<!-- end col -->

		<!-- end col -->
	</div>
	<!-- end row -->


</div>
<!-- container-fluid -->

@endsection