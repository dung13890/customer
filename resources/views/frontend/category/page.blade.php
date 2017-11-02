@extends('layouts.frontend')

@section('page-content')
@if ($item)
    <div class="featured-image clearfix">
        <img class="img-responsive" src="{{ route('image', $item->banner_default) }}" />
    </div>
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
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="single-post-wrap">
                        <div class="post-content">
                            @if (count($pages))
                            @foreach ($pages as $page)
                            <div class="box-list news-block mb-15">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="box-list-img" href="{{ route('page.show', $page->slug) }}" title="{{ $page->name }}">
                                            <img class="img-responsive" src="{{ route('image', $page->image_small) }}" alt="{{ $page->name }}" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="box-list-title">
                                            <a href="{{ route('page.show', $page->slug) }}" title="{{ $page->name }}">{{ $page->name }}</a>
                                        </h4>
                                    </div>
                                </div>
                                <p class="box-list-info mt-10">{{ $page->ceo_description }}</p>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
