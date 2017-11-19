@extends('layouts.frontend')

@section('page-content')
<div class="page-title-block mt-30 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2 class="page-title title-one-full pl-50">
                    <span>{{ $heading }}</span>
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="single-product-container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="single-post-wrap">
                    <div class="post-content">
                        <div class="row">
                            <div class="page-slider owl-carousel">
                                @if (count($categories))
                                @foreach ($categories as $category)
                                    <div class="page-item item">
                                        <div class="page-item__image col-sm-12 col-md-6 col-lg-6">
                                            <img src="{{ route('image', $category->image_medium) }}" alt="{{ $category->name }}">
                                        </div>
                                        <div class="page-item__content col-sm-12 col-md-6 col-lg-6">
                                            <h3 class="box-list-title">
                                                <a href="{{ route('category.show', $category->slug) }}" title="{{ $category->name }}">{{ $category->name }}</a>
                                            </h3>
                                            {{ $category->description }}
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
