<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name') }} | @yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/admin-lite.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/admin-theme.min.css') }}">
        @yield('styles')
        <!--[if lt IE 9]>
        <script src="{{ asset('backend/js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('backend/js/respond.min.js') }}"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('backend.include.header')
            @include('backend.include.sidebar')
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('backend.include.footer')
            @include('backend.include.toolbar')
        </div>
        <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
        @yield('scripts')
    </body>
</html>