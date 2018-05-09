<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('frontend/js/app.js') }}" defer></script>
</head>
<body>
    @include('frontend.include.messages')
    @yield('content')
</body>
</html>