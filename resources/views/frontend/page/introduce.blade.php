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
                <div class="control-blog">
                   <p>
                        <span>{{ $item->create_dt }}</span>
                        <a href="{{ asset('/statics/file/' . $item->file) }}">
                            <i class="fa fa-file-pdf-o"></i>Download
                        </a>
                        <a href="#">
                            <i class="fa fa-print"></i>Print
                        </a>
                   </p>
               </div>
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="single-post-wrap">
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
                            <h3 class="block-title title-two">
                                <span>{{ __('repositories.text.introduce_company') }}</span>
                            </h3>
                            <div class="block-content">
                                @if (count($__categoryIntroduce))
                                @foreach ($__categoryIntroduce->take(6) as $category)
                                <div class="box-list undefined">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="{{ route('category.show', $category->slug) }}" target="_blank" title="{{ $category->name }}">
                                                <img class="img-responsive" src="{{ route('image', $category->icon_thumbnail) }}" alt="{{ $category->name }}">
                                            </a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4 class="box-list-title">
                                                <a href="{{ route('category.show', $category->slug) }}" title="{{ $category->name }}">{{ $category->name }}</a>
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
