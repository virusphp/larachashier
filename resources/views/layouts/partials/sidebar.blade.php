<div class="app-menu navbar-menu">
	<!-- LOGO -->
	<div class="navbar-brand-box">
		<!-- Dark Logo-->
		<a href="index.html" class="logo logo-dark">
			<span class="logo-sm">
				<img src="{{ asset('themes/images/logo-sm.png') }}" alt="" height="22" />
			</span>
			<span class="logo-lg">
				<img src="{{ asset('themes/images/logo-dark.png') }}" alt="" height="17" />
			</span>
		</a>
		<!-- Light Logo-->
		<a href="index.html" class="logo logo-light">
			<span class="logo-sm">
				<img src="{{ asset('themes/images/logo-sm.png') }}" alt="" height="22" />
			</span>
			<span class="logo-lg">
				<img src="{{ asset('themes/images/logo-light.png') }}" alt="" height="17" />
			</span>
		</a>
		<button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
			id="vertical-hover">
			<i class="ri-record-circle-line"></i>
		</button>
	</div>

	<div id="scrollbar">
		<div class="container-fluid">
			<div id="two-column-menu"></div>
			<ul class="navbar-nav" id="navbar-nav">
				<li class="menu-title">
					<span data-key="t-menu">Menu</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('dashboard')  }}" role="button" aria-expanded="false"
						aria-controls="sidebarDashboards">
						<i class="bx bxs-dashboard"></i>
						<span data-key="t-dashboards">Dashboards</span>
					</a>
				</li>
				<!-- end Dashboard Menu -->
				<li class="nav-item">
					<a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
						aria-expanded="false" aria-controls="sidebarApps">
						<i class="bx bx-layer"></i>
						<span data-key="t-apps">Master</span>
					</a>
					<div class="collapse menu-dropdown" id="sidebarApps">
						<ul class="nav nav-sm flex-column">
							<li class="nav-item">
								<a href="{{ route('gudang.rak.index')  }}" class="nav-link">
									Rak
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('gudang.unit-bagian.index')  }}" class="nav-link">
									Unit Bagian
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('gudang.satuan.index')  }}" class="nav-link">
									Satuan
								</a>
							</li>

							<li class="nav-item">
								<a href="{{ route('gudang.jenis-barang.index')  }}" class="nav-link">
									Jenis Barang
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('gudang.kelompok-barang.index')  }}" class="nav-link">
									Kelompok Barang
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
						aria-expanded="false" aria-controls="sidebarApps">
						<i class="bx bx-layer"></i>
						<span data-key="t-apps">Settings</span>
					</a>
					<div class="collapse menu-dropdown" id="sidebarApps">
						<ul class="nav nav-sm flex-column">
							<li class="nav-item">
								<a href="#master" class="nav-link" data-bs-toggle="collapse" role="button"
									aria-expanded="false" aria-controls="master" data-key="t-master">
									Options
								</a>
								<div class="collapse menu-dropdown" id="">
									<ul class="nav nav-sm flex-column">
										<li class="nav-item">
											<a href="apps-calendar.html" class="nav-link" data-key="t-main-master">
												Kategori
											</a>
										</li>
										<li class="nav-item">
											<a href="apps-calendar-month-grid.html" class="nav-link"
												data-key="t-month-grid">
												Produk
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="nav-item">
								<a href="apps-todo.html" class="nav-link">
									<span data-key="t-to-do">To Do</span></a>
							</li>
						</ul>
					</div>
				</li>
				<!-- end Dashboard Menu -->
			</ul>
		</div>
		<!-- Sidebar -->
	</div>

	<div class="sidebar-background"></div>
</div>