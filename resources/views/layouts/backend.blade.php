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
    {{ Html::style(mix('/assets/css/backend/app.css')) }}
    @stack('prestyles')
</head>
<body>
    <div class="wrapper">
        @include('backend._partials.header')
        <div class="app-body">
            @include('backend._partials.sidebar')
            <main class="main">
                <div class="container-fluid">
                    @yield('page-content')
                </div>
            </main>
        </div>
    </div>
    {{ Html::script(mix('/assets/js/backend.js')) }}
    @stack('prescripts')
</body>
</html>
