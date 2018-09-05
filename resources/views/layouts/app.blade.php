<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{--<link rel="shortcut icon" href="{{ asset('images/favicon-16x16.png') }}}">--}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'supply chain') }}</title>

    @include('main.cssFile')
    @yield('css')


    <!-- Styles -->
</head>
<body class=" lna-index-index">

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('main.jsFiles')
    @yield('js')
    @yield('scripts')
    @yield('modal')


</body>
</html>
