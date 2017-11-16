<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>{!! $heading or $configs['name'] !!}</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="description" content="{{ $description or $configs['description'] }}">
    <meta name="keywords" content="{{ $keywords or $configs['keywords'] }}">
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:site_name" content="{{ $heading or $configs['name'] }}" />
    <meta property="og:type"   content="website" />
    <meta property="og:title"  content="{{ $heading or $configs['name'] }}" />
    <meta property="og:description"  content="{{ $description or $configs['description'] }}" />
    <meta property="og:image"  content="{{ $image_social or '/favicon.ico' }}" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    {{ Html::style('/frontend/css/main.css') }}
    @stack('prestyles')
</head>
<body class="{{ $class or null }}">
    <div class="wrapper">
        @include('frontend.header.header')
        <div class="main-container">
            @yield('page-content')
        </div>
        @include('frontend.footer.footer')
    </div>
    @include('frontend.footer.popup')
    {{ Html::script('/frontend/js/main.min.js') }}
    @stack('prescripts')
</body>
</html>
