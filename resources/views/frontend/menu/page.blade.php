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
                        @if (count($pages))
                        @foreach ($pages->chunk(2) as $chunks)
                        <div class="row">
                            @foreach ($chunks as $chunk)
                            <div class="col-xs-12 col-sm-6">
                                <div class="box-list news-block mb-15">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="{{ route('page.show', $chunk->slug) }}" title="{{ $chunk->name }}">
                                                <img class="img-responsive" src="{{ route('image', $chunk->image_small) }}" alt="{{ $chunk->name }}" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="box-list-title">
                                                <a href="{{ route('page.show', $chunk->slug) }}" title="{{ $chunk->name }}">{{ $chunk->name }}</a>
                                            </h4>
                                            <p class="box-list-info mt-10">{{ $chunk->ceo_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
