@extends('layouts.frontend')
@section('page-content')
    <section class="home-slideshow clearfix" id="home-slideshow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="el-slideshow slider-main" id="js-slider-main">
                        @if (count($slides))
                        @foreach ($slides as $slide)
                        <div class="item">
                            <img src="{{ route('image', $slide->image_1170x445) }}" alt="" />
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="daily-news mt-30 mb-30 clearfix" id="daily-news">
        <div class="container">
            <div class="title-one-full pl-50">
                <a href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>
            </div>
            <div class="row">
                @if (count($paginates))
                @foreach ($paginates as $post)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mb-20">
                    <div class="box-grid news-block mb-15">
                        <a class="box-grid-img" href="{{ route('post.show', $post->slug) }}" title="{{ $post->name }}">
                            <img class="img-responsive" src="{{ route('image', $post->image_medium) }}" alt="{{ $post->name }}" />
                        </a>
                        <h4 class="box-grid-title">
                            <a href="{{ route('post.show', $post->slug) }}" title="{{ $post->name }}">{{ $post->name }}</a>
                        </h4>
                        <p class="box-grid-info mt-10">{{ $post->ceo_description }}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="row">
                <div class="container">
                    <nav class="pagination-wrapper pull-right">
                        <nav>{{ $paginates->render() }}</nav>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    @if (count($categories))
    @foreach ($categories as $category)
    <section class="promotion-news mb-30 clearfix">
        <div class="container">
            <div class="title-one-full pl-50">
                <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
            </div>
            <div class="row">
                @if (count($category->homePosts))
                <?php
                    $postFirst = $category->homePosts->shift();
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mb-20">
                    <div class="box-grid news-block mb-15">
                        <a class="box-grid-img" href="{{ route('post.show', $postFirst->slug) }}" title="{{ $postFirst->name }}">
                            <img class="img-responsive" src="{{ route('image', $postFirst->image_medium) }}" alt="{{ $postFirst->name }}" />
                        </a>
                        <h4 class="box-grid-title">
                            <a href="{{ route('post.show', $postFirst->slug) }}" title="{{ $postFirst->name }}">{{ $postFirst->name }}</a>
                        </h4>
                        <p class="box-grid-info mt-10">{{ $postFirst->ceo_description }}</p>
                    </div>
                </div>
                @foreach ($category->homePosts->chunk(3) as $chunks)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mb-20">
                    @foreach ($chunks as $chunk)
                    <div class="box-list news-block mb-15">
                        <div class="media">
                            <div class="media-left">
                                <a class="box-list-img" href="{{ route('post.show', $chunk->slug) }}" title="{{ $chunk->name }}">
                                    <img class="img-responsive" src="{{ route('image', $chunk->image_156x100) }}" alt="{{ $chunk->name }}" />
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="box-list-title">
                                    <a href="{{ route('post.show', $chunk->slug) }}" title="{{ $chunk->name }}">{{ $chunk->name }}</a>
                                </h4>
                            </div>
                        </div>
                        <p class="box-list-info mt-10">{{ $chunk->ceo_description }}</p>
                    </div>
                    @endforeach
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    @endforeach
    @endif
@endsection
