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
                <div class="col-xs-12 col-sm-12">
                    <div class="single-post-wrap">
                        <div class="control-blog">
                           <p>
                                <span>{{ $item->create_dt }}</span>
                                <a href="{{ asset('/statics/file/' . $item->file) }}">
                                    <i class="fa fa-file-pdf-o"></i>Download PDF
                                </a>
                                <a href="#">
                                    <i class="fa fa-print"></i>Print
                                </a>
                           </p>
                       </div>

                       @if ($item->type == 'recruitment' && count($item->attributes))
                       <div class="post-attributes">
                            @foreach ($item->attributes as $attribute)
                                <p>
                                <strong class="attribute-key">{{ $attribute['key'] }}:</strong>
                                <span class="attribute-value">{{ $attribute['value'] }}</span>
                                </p>
                            @endforeach
                       </div>
                        @endif
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
                        @if ($item->is_comment)
                        <div class="fb-comments" data-href="{{ Request::url()}}" data-width="100%" data-numposts="5"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
@push('prestyles')
{{ Html::style('/frontend/css/custom.css') }}
@endpush
@include('frontend.scripts._facebook')
