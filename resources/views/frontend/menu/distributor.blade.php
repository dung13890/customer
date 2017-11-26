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
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div id="vnm_map"></div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <h3 class="box-list-title">
                    <a href="{{ $distributor ? route('category.show', $distributor->slug) : 'javascript:void(0)' }}" id="title-distributor">{{ $distributor->name or '' }}</a>
                </h3>
                <div id="description-distributor">{!! $distributor->description or '' !!}</div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('prestyles')
{{ Html::style('/frontend/css/custom.css') }}
@endpush

@push('prescripts')
<script>
    window.distributorCds = {!! json_encode($distributorCds) !!};
    window.distributorCd = '{{ $distributorCd }}';
    window.messageNotFound = '{{ __("repositories.text.not_distributor") }}';
</script>
{{ Html::script(mix('/assets/js/distributor.js')) }}
@endpush
