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
                <aside class="sidebar sidebar-blog col-xs-12 col-sm-12 col-md-4">
                    <div class="sidebar-inner">
                        <div class="block block-news">
                            <div class="block-content">
                                @if (count($posts))
                                @foreach ($posts as $post)
                                @if ($loop->first)
                                <div class="box-grid news-block mb-15">
                                    <a class="box-grid-img" href="{{ route('post.show', $post->slug) }}" title="{{ $post->name }}">
                                        <img class="img-responsive" src="{{ route('image', $post->image_medium) }}" alt="{{ $post->name }}">
                                    </a>
                                    <h4 class="box-grid-title">
                                        <a href="{{ route('post.show', $post->slug) }}" title="{{ $post->name }}">{{ $post->name }}</a>
                                    </h4>
                                    <p class="box-grid-info mt-10">{{ $post->ceo_description }}</p>
                                </div>
                                @else
                                <div class="box-list news-block mb-15">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="{{ route('post.show', $post->slug) }}" target="_blank" title="{{ $post->name }}">
                                                <img class="img-responsive" src="{{ route('image', $post->image_156x100) }}" alt="{{ $post->name }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="box-list-title">
                                                <a href="{{ route('post.show', $post->slug) }}" target="_blank" title="{{ $post->name }}">{{ $post->name }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="box-list-info mt-10">{{ $post->ceo_description }}</p>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="block block-news">
                            <h3 class="block-title title-two">
                                <span>{{ $category->name }}</span>
                            </h3>
                            <div class="block-content">
                                @if (count($category->homePosts))
                                @foreach ($category->homePosts as $homePost)
                                <div class="box-list undefined">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="{{ route('post.show', $homePost->slug) }}" target="_blank" title="{{ $homePost->name }}">
                                                <img class="img-responsive" src="{{ route('image', $homePost->image_156x100) }}" alt="{{ $homePost->name }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="box-list-title">
                                                <a href="{{ route('post.show', $homePost->slug) }}" target="_blank" title="{{ $homePost->name }}">{{ $homePost->name }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endif
@endsection
