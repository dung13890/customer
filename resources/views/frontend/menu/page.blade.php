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
                        <table class="table page-table">
                            <thead>
                                <tr>
                                    <th scope="col">Ngày</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Tải về</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($pages))
                                @foreach ($pages->chunk(2) as $chunks)
                                @foreach ($chunks as $chunk)
                                <tr>
                                    <th class="item-date text-center" scope="row">15/11/2017</th>
                                    <td class="item-image text-center">
                                        <a class="box-list-img" href="{{ route('page.show', $chunk->slug) }}" title="{{ $chunk->name }}">
                                            <img class="img-responsive" src="{{ route('image', $chunk->image_small) }}" alt="{{ $chunk->name }}" />
                                        </a>
                                    </td>
                                    <td>
                                        <h5 class="box-list-title">
                                            <a href="{{ route('page.show', $chunk->slug) }}" title="{{ $chunk->name }}">{{ $chunk->name }}</a>
                                        </h5>
                                        <p class="box-list-info mt-10">{{ $chunk->ceo_description }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a class="link-download" href="{{ route('page.show', $chunk->slug) }}">Download</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
