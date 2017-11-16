@extends('layouts.frontend')
@section('page-content')

<div class="page-title-block mt-30 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2 class="page-title title-one-full pl-50">
                    <span>{{ __('repositories.title.contact') }}</span>
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="single-product-container">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
                <h4 class="heading color">Thông tin</h4>
                <!-- Contact form-->
                {{ Form::open([
                    'url' => route('home.contact'),
                    'role'  => 'form',
                    'class' => 'contact-form',
                    'autocomplete'=>'off',
                ]) }}
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Họ và tên" name="name" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Email" name="email" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Số điện thoại" name="phone" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" type="text" placeholder="Nhập nội dung" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Gửi</button>
                    </div>
                {{ Form::close() }}
            </div>
            <div class="col-md-8 col-lg-8">
                <iframe frameborder="0" style="width:100%;height:374px;border:0;" src="{{ $configs['map'] }}" allowfullscreen="allowfullscreen"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
