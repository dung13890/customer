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
                        <img src="{{ route('image', $slide->image_1170x445) }}" />
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-intro clearfix" id="home-intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                {!! $configs['introduce'] !!}
            </div>
        </div>
    </div>
</section>
<section class="home-categories mb-30 clearfix" id="home-categories">
    <div class="container">
        <div class="row">
            @if (count($productCategories))
            @foreach ($productCategories as $proCate)
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>{{ $proCate->name }}</span>
                    </h2>
                    <div class="category-image">
                        <a href="{{ route('category.show', $proCate->slug) }}">
                            <img class="img-responsive" src="{{ route('image', $proCate->image_medium) }}" alt="{{ $proCate->name }}" />
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<section class="home-news mb-30 clearfix" id="home-news">
    <div class="container">
        <div class="row">
            @if (count($postCategories))
            @foreach ($postCategories as $postCate)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mb-20">
                <div class="title-one">
                    <h2>{{ $postCate->name }}</h2>
                </div>
                @if (count($postCate->homePosts))
                <?php
                    $take = $loop->first ? 7 : 3;
                ?>
                @foreach ($postCate->homePosts->take($take) as $post)
                @if ($loop->parent->first && $loop->index > 0)
                <div class="news-links list-links">
                    <a href="{{ route('post.show', $post->slug) }}" title="{{ $post->name }}">{{ $post->name }}</a>
                </div>
                @else
                <div class="box-list news-block mb-15">
                    <div class="media">
                        <div class="media-left">
                            <a class="box-list-img" href="{{ route('post.show', $post->slug) }}" title="{{ $post->name }}">
                                <img class="img-responsive" src="{{ route('image', $post->image_156x100) }}" alt="{{ $post->name }}" />
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="box-list-title">
                                <a href="{{ route('post.show', $post->slug) }}" title="{{ $post->name }}">{{ $post->name }}</a>
                            </h4>
                        </div>
                    </div>
                    <p class="box-list-info mt-10">{{ $post->ceo_description }}</p>
                </div>
                @endif
                @endforeach
                @endif
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@if (count($pages))
<section class="home-client-say mb-30 clearfix" id="home-client-say">
    <div class="container">
        <div class="title-one-full">
            <h2>{{ __('repositories.text.feedback_of_customer') }}</h2>
        </div>
        <div class="row">
            @foreach ($pages as $page)
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <div class="category-image">
                        <a href="{{ route('page.show', $page->slug) }}">
                            <img class="img-responsive" src="{{ route('image', $page->image_medium) }}" alt="{{ $page->name }}" />
                        </a>
                        <h4 class="text-center">{{ $page->name }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
