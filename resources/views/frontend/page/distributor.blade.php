@extends('layouts.frontend')

@section('page-content')
@if ($item)
    <div class="page-title-block mt-30 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="page-title title-one-full pl-50">
                        <span>{{ $item->name }}</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="single-product-container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="single-post-wrap">
                        <div class="row">
                            <div class="page-slider-single">
                                <div class="page-item item">
                                    <div class="page-item__image col-sm-12 col-md-6 col-lg-6">
                                        <img src="{{ route('image', $item->image_small) }}" alt="{{ $item->name }}">
                                    </div>
                                    <div class="page-item__content col-sm-12 col-md-6 col-lg-6">
                                        <h3 class="box-list-title">
                                            <a href="{{ route('page.show', $item->slug) }}" title="{{ $item->name }}">{{ $item->name }}</a>
                                        </h3>
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
