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
                                @foreach ($pages as $page)
                                    <tr>
                                        <th class="item-date text-center" scope="row">{{ $page->create_dt }}</th>
                                        <td class="item-image text-center">
                                            <a class="box-list-img" href="{{ route('page.show', $page->slug) }}" title="{{ $page->name }}">
                                                <img class="img-responsive" src="{{ route('image', $page->image_small) }}" alt="{{ $page->name }}" />
                                            </a>
                                        </td>
                                        <td>
                                            <h5 class="box-list-title">
                                                <a href="{{ route('page.show', $page->slug) }}" title="{{ $page->name }}">{{ $page->name }}</a>
                                            </h5>
                                            <p class="box-list-info mt-10">{{ $page->ceo_description }}</p>
                                        </td>
                                        <td class="text-center">
                                            @if ($page->file)
                                            <a class="link-download" href="{{ asset('/statics/file/' . $page->file) }}">Download</a>
                                            @endif
                                        </td>
                                    </tr>
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
