@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.index'))

@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/category.js')) }}
    <script>
        $(function () {
            window.flash_message = '{!! session("flash_message") !!}';
            var items = {!! $items->toJson() !!};
            var item = {!! $item or 0 !!};
            window.category.index(items, item);
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/category.css') }}
@endpush

@section('page-content')
<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $heading }}</h3>
                </div>
                <div class="panel-body">
                    @include('backend._partials.components.notification_message')
                    @if(isset($item))
                    {{ Form::model($item, [
                        'method' => 'PATCH',
                        'url' => route('backend.category.update', $item->id),
                        'role'  => 'form',
                        'files' => true,
                        'autocomplete'=>'off',
                    ]) }}
                        @include('backend.category._form')
                    {{ Form::close() }}
                    @else
                    {{ Form::open([
                        'url' => route('backend.category.store'),
                        'files' => true,
                        'autocomplete'=>'off',
                    ]) }}
                    {{ Form::hidden('type', $type) }}
                        @include('backend.category._form')
                    {{ Form::close() }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ __('repositories.title.category') }}</h3>
                </div>
                <div class="panel-body">
                    <div class="block-style" id="list"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
