<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    {{ Html::style('/frontend/css/main.css') }}
    @stack('prestyles')
</head>
<body>
    <div class="wrapper">
        @include('frontend.header.header')
        <div class="main-container">
            @yield('page-content')
        </div>
        @include('frontend.footer.footer')
    </div>
    <div id="fb-root"></div>
    {{ Html::script('/frontend/js/main.js') }}
    @stack('prescripts')
</body>
</html>
