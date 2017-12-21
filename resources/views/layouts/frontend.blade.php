<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>{{ $heading or $configs['name'] }}</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="description" content="{{ $description or $configs['description'] }}">
    <meta name="keywords" content="{{ $keywords or $configs['keywords'] }}">
    <meta property="fb:app_id" content="{{ env('FB_APP_ID') }}" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:site_name" content="{{ $heading or $configs['name'] }}" />
    <meta property="og:type"   content="website" />
    <meta property="og:title"  content="{{ $heading or $configs['name'] }}" />
    <meta property="og:description"  content="{{ $description or $configs['description'] }}" />
    <meta property="og:image"  content="{{ $image_social or route('image', $configs['logo']) }}" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    {{ Html::style('/frontend/css/main.min.css') }}
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
    @if ($configs['hotline'])
    <a class="call-mobile" href="tel:{{ $configs['hotline'] }}">
        <span class="call-number">{{ $configs['hotline'] }}</span><i class="fa fa-phone"></i>
    </a>
    @endif
    @include('frontend.footer.popup')
    {{ Html::script('/frontend/js/main.min.js') }}
    @stack('prescripts')
    <!-- Global site tag (vchat.js) - Vchat -->
    <script type="text/javascript">(function() {
        var pname = ( (document.title !='')? document.title : ((document.querySelector('h1') != null)? document.querySelector('h1').innerHTML : '') );
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async=1;
        ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash={{ $configs['vchat_hash'] }}&data={{ $configs['vchat_data'] }}&pname='+pname;
        var s = document.getElementsByTagName('script');
        s[0].parentNode.insertBefore(ga, s[0]);
        })();
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $configs['analytics_id'] }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '{{ $configs["analytics_id"] }}');
    </script>
    @if ($configs["adwords_id"] )
    <!-- Global site tag (conversion.js) - Google Adwords -->
    <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = {{ $configs["adwords_id"] }};
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="{{ $configs['adwords_src'] }}"/>
    </div>
    </noscript>
    @endif
</body>
</html>
