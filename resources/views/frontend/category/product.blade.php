@extends('layouts.frontend')

@section('page-content')
    <div class="featured-image clearfix container">
        <img class="img-responsive" src="{{ route('image', $item->banner_1170x445) }}" alt="" />
    </div>
    <div class="category-container mb-30 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="page-title title-one-full">
                        <span>{{ $item->name }}</span>
                    </h2>
                </div>
                <div class="products">
                    @if (count($products))
                    @foreach ($products as $product)
                    <div class="product xs-full col-xs-6 col-sm-6 col-md-4 col-lg-4">
                        <div class="product-inner">
                            <a class="product-image" href="{{ route('product.show', $product->slug) }}">
                                <img class="img-responsive" src="{{ route('image', $product->image_medium) }}" alt="" />
                            </a>
                            <div class="product-content">
                                <h4 class="product-name">
                                    <a href="{{ route('product.show', $product->slug) }}">{{ str_limit($product->name, 50) }}</a>
                                </h4>
                                <div class="product-info">
                                    <span>{{ $product->feature_1 }}</span>
                                    <span>{{ $product->feature_2 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="shop-pagination">
        <div class="container">
            <nav class="pagination-wrapper">
                <nav>{{ $products->render() }}</nav>
            </nav>
        </div>
    </div>
@endsection
