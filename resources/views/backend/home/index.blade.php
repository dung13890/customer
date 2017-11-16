@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.index'))

@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/home.js')) }}
    <script>
        $(function () {
            window.flash_message = '{!! session("flash_message") !!}';
            window.home.index();
        });
    </script>
@endpush

@section('page-content')
<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $heading }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            @include('backend._partials.components.notification_message')
                        </div>
                    </div>
                    @component('backend._partials.components.filter', ['search_field' => __('repositories.title.search')])
                        @slot('filter_fields')
                        @endslot
                    @endcomponent
                    <div class="table-responsive">
                        <table id="table-index" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th>{{ __('repositories.label.name') }}</th>
                                    <th>{{ __('repositories.label.email') }}</th>
                                    <th>{{ __('repositories.label.phone') }}</th>
                                    <th>{{ __('repositories.label.content') }}</th>
                                    <th>{{ __('repositories.label.action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
