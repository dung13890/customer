@extends('layouts.frontend')

@section('page-content')
    <div class="featured-image clearfix">
        <img class="img-responsive" src="images/banner-category.jpg" alt="" />
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
                               <a href="#">
                                   <i class="fa fa-file-pdf-o"></i>Download PDF</a>
                               <a href="#">
                                   <i class="fa fa-print"></i>Print</a>
                           </p>
                       </div>
                        <div class="post-content">
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
