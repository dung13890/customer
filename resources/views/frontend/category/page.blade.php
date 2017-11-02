@extends('layouts.frontend')

@section('page-content')
@if ($item)
    <div class="featured-image clearfix">
        <img class="img-responsive" src="{{ route('image', $item->banner_default) }}" alt="{{ $item->name }}" />
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
                        <div class="control-blog">
                           <p>

                           </p>
                       </div>
                        <div class="post-content">
                            {!! $item->description !!}
                        </div>
                        <div class="fb-comments" data-href="{{ Request::url()}}" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
@push('prescripts')
    <div id="fb-root"></div>
    <script>
        (function(d, s, id)
        {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=590749964645815';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endpush
