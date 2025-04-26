<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{--
    <link href="{{ asset('img/favicon.ico') }}" rel="icon" type="image/png"> --}}
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    {{-- @laravelPWA --}}
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/helper-function.js') }}"></script>
    @vite('resources/js/app.js');
    @stack('scripts')
</body>

</html>