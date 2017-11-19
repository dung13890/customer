@extends('layouts.frontend')

@section('page-content')
<div class="container">
    <h2 class="page-title title-three">
        <span>{{ $item->name }}</span>
    </h2>
</div>
@if ($item->slides)
@foreach ($item->slides as $slide)
<div class="featured-image  @if($loop->iteration  % 2 == 0) box-left @else box-right @endif clearfix">
    <img class="img-responsive" src="{{ route('image', $slide->image_1920x570) }}" alt="{{ $slide->name }}" />
    <div class="container">
        <div class="featured-image-container">
            <div class="featured-image-content">
                <h2>{{ $slide->name }}</h2>
                <div class="category-info">
                    <p>{{ $slide->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection
