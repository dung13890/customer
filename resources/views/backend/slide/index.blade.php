@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.index'))

@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/slide.js')) }}
    <script>
        $(function () {
            var type = '{{ $type }}';
            window.flash_message = '{!! session("flash_message") !!}';
            window.routeType = window.laroute.route('backend.slide.type', {'type': type, 'datatables': 1});
            window.slide.index();
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
                    @can('slide-create')
                    <a href="{{ route('backend.slide.create.type', $type) }}" class="btn btn-success btn-sm create-form"><i class="ion-plus-round"></i> {{ __('repositories.title.create') }}</a>
                    @endcan
                    <div class="table-responsive">
                        <table id="table-index" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th>{{ __('repositories.label.name') }}</th>
                                    <th>{{ __('repositories.label.description') }}</th>
                                    <th>{{ __('repositories.label.locked') }}</th>
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
