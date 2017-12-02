@extends('layouts.frontend')

@section('page-content')
@if ($item)
    <div class="featured-image clearfix">
        <img class="img-responsive" src="{{ route('image', $item->category->banner_default) }}" alt="" />
    </div>
    <div class="page-title-block mt-30 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="page-title title-one-full pl-50">
                        <span>{{ $item->category->name }}</span>
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
                        <h1 class="post-title">{{ $item->name }}</h1>
                        <div class="control-blog">
                            <p></p>
                        </div>
                        <div class="post-content">
                            {!! $item->description !!}
                        </div>
                        <div class="share-links">
                            <ul class="social-icons list-inline pull-right">
                                <li class="list-inline-item share-text">
                                    <span><i class="fa fa-share"></i></span>
                                </li>
                                <li class="list-inline-item facebook">
                                    <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" class="post-share-facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item twitter">
                                    <a href="https://twitter.com/share?url={{ Request::url() }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="post-share-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item google-plus">
                                    <a href="https://plus.google.com/share?url={{ Request::url() }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item pinterest">
                                    <a href="http://pinterest.com/pin/create/button/?url={{ Request::url() }}&media={{ route('image', $item->image_medium) }}&description={{ $item->ceo_description }}"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        @include('frontend.comment._comment')
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
@push('prestyles')
{{ Html::style('/frontend/css/custom.css') }}
@endpush
