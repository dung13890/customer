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
            <h4>TRANG BẠN TÌM KIẾM KHÔNG TỒN TẠI</h4>
            <a href="{{ url()->previous() }}">Quay về trang trước</a>
        </div>
    </div>
</div>
@endsection
