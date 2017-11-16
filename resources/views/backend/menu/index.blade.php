@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.index'))

@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/menu.js')) }}
    <script>
        $(function () {
            window.flash_message = '{!! session("flash_message") !!}';
            var items = {!! $items ? $items->toJson() : '{}' !!};
            var item = {!! $item or 0 !!};
            window.menu.index(items, item);
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/menu.css') }}
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
                        'url' => route('backend.menu.update', $item->id),
                        'role'  => 'form',
                        'files' => true,
                        'autocomplete'=>'off',
                    ]) }}
                        @include('backend.menu._form')
                    {{ Form::close() }}
                    @else
                    {{ Form::open([
                        'url' => route('backend.menu.store'),
                        'files' => true,
                        'autocomplete'=>'off',
                    ]) }}
                        @include('backend.menu._form')
                    {{ Form::close() }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ __('repositories.title.menu') }}</h3>
                </div>
                <div class="panel-body">
                    <div class="block-style" id="list"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
