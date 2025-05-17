<!DOCTYPE html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
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

    <link href="{{ asset('themes/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    {{--
    <link href="{{ asset('themes/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet"
        type="text/css" /> --}}

    @livewireStyles
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        {{-- Header --}}
        @include('layouts.partials.header')
        {{-- End Header --}}

        {{-- App Menu --}}
        <x-sidebar />
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

                    {{ $slot }}
                </div>
            </div>
            {{-- End Content --}}

            {{-- Footer --}}
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2025
                            © SMP.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                IT RSUDKRATON Team
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

    @livewireScripts
    <!-- JAVASCRIPT -->
    <script src="{{ asset('themes/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('themes/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('themes/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('themes/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    @stack('scripts')


</body>

</html>