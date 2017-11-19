@extends('layouts.frontend')
@section('page-content')
    <div class="featured-image clearfix">
        @if (count($categories))
        <img class="img-responsive" src="{{ route('image', $categories->first()->banner_1920x570) }}" alt="" />
        @endif
    </div>
    <section class="daily-news mt-30 mb-30 clearfix" id="daily-news">
        <div class="container">
            <div class="title-one-full pl-50">
                <h3>{{ $heading }}</h3>
            </div>
            <div class="row">
                @if (count($categories))
                @foreach ($categories as $category)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mb-20">
                    <div class="box-grid news-block mb-15">
                        <a class="box-grid-img" href="{{ route('category.show', $category->slug) }}" title="{{ $category->name }}">
                            <img class="img-responsive" src="{{ route('image', $category->image_medium) }}" alt="{{ $category->name }}" />
                        </a>
                        <h4 class="box-grid-title">
                            <a href="{{ route('category.show', $category->slug) }}" title="{{ $category->name }}">{{ $category->name }}</a>
                        </h4>
                        <p class="box-grid-info mt-10">{{ $category->description }}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
