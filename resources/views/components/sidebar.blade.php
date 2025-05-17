<div class="app-menu navbar-menu">
	<div id="scrollbar">
		<div class="container-fluid">
			<div id="two-column-menu"></div>
			<ul class="navbar-nav" id="navbar-nav">
				{{-- start Dashboard Menu --}}
				<x-nav-link :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
					<i class="bx bxs-dashboard"></i>
					<span data-key="t-dashboards">Dashboards</span>
				</x-nav-link>
				<!-- end Dashboard Menu -->
				<li class="nav-item">
					<a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
						aria-expanded="false" aria-controls="sidebarApps">
						<i class="bx bx-layer"></i>
						<span data-key="t-apps">Master</span>
					</a>
					<div class="collapse menu-dropdown" id="sidebarApps">
						<ul class="nav nav-sm flex-column">
							<x-nav-link :active="request()->routeIs('gudang.barang.index')"
								href="{{ route('gudang.barang.index') }}">Barang Farmasi
							</x-nav-link>

							<x-nav-link :active="request()->routeIs('gudang.rak.index')"
								href="{{ route('gudang.rak.index') }}">Rak
							</x-nav-link>

							<x-nav-link :active="request()->routeIs('gudang.unit-bagian.index')"
								href="{{ route('gudang.unit-bagian.index') }}">Unit Bagian
							</x-nav-link>

							<x-nav-link :active="request()->routeIs('gudang.satuan.index')"
								href="{{ route('gudang.satuan.index') }}">Satuan
							</x-nav-link>

							<x-nav-link :active="request()->routeIs('gudang.jenis-barang.index')"
								href="{{ route('gudang.jenis-barang.index') }}">Jenis Barang
							</x-nav-link>

							<x-nav-link :active="request()->routeIs('gudang.kelompok-barang.index')"
								href="{{ route('gudang.kelompok-barang.index') }}">Kelompok Barang
							</x-nav-link>

							<x-nav-link :active="request()->routeIs('gudang.golongan-barang.index')"
								href="{{ route('gudang.golongan-barang.index') }}">Golongan Barang
							</x-nav-link>

							<x-nav-link :active="request()->routeIs('gudang.suplier.index')"
								href="{{ route('gudang.suplier.index') }}">Suplier
							</x-nav-link>

							<x-nav-link :active="request()->routeIs('gudang.pabrik.index')"
								href="{{ route('gudang.pabrik.index') }}">Pabrik
							</x-nav-link>

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