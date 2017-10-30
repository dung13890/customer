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
    {{ Html::style('/frontend/css/main.min.css') }}
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
    <div class="modal fade custom-modal" id="modal-onload" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="modal-title">Khuyễn mại cuối năm - Sale Off 50%</h3>
                    <h5>Bình Nước Nóng Toàn Thắng Giải pháp Tốt & Hiệu quả nhất cho mùa đông</h5>
                    <p>Tầng 7, Tòa nhà số 8 Quang Trung, Quận Hà Đông, Hà Nội </p>
                    <p>Hãy để lại email của bạn cho chúng tôi để nhận được những ưu đãi tốt nhất</p>
                    <form class="contact-form" name="contact-form" action="/contact/" method="POST">
                        <div class="form-group">
                            <input class="form-control" placeholder="Họ và tên" name="name" type="text" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Email" name="email" type="text" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Số điện thoại" name="phone-number" type="text" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="text" placeholder="Nhập nội dung" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{ Html::script('/frontend/js/main.min.js') }}
    @stack('prescripts')
</body>
</html>
