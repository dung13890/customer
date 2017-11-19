@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.index'))

@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/role.js')) }}
    <script>
        $(function () {
            window.flash_message = '{!! session("flash_message") !!}';
            window.role.index();
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
                    @can('role-create')
                    <a href="{{ route('backend.role.create') }}" class="btn btn-success btn-sm create-form"><i class="ion-plus-round"></i> {{ __('repositories.title.create') }}</a>
                    @endcan
                    <div class="table-responsive">
                        <table id="table-index" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th>{{ __('repositories.label.name') }}</th>
                                    <th>{{ __('repositories.label.abilities') }}</th>
                                    <th>{{ __('repositories.label.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        {!! $role->abilities->pluck('name')->map(function ($item) {
                                            $parts = explode('-', $item);
                                            return '<span class="label label-primary">' . __('repositories.title.' . $parts[1]) . '-' . __('repositories.'. $parts[0] . '.name') . '</span>';
                                        })->implode(' ') !!}
                                    </td>
                                    <td>
                                        @can ('role-edit')
                                        <a href="{{ route('backend.role.edit', $role) }}" class="btn btn-xs btn-default"><i class="ion-edit"></i></a>
                                        @endcan
                                        @can('role-destroy')
                                        <a href="{{ route('backend.role.destroy', $role) }}" class="btn btn-xs btn-danger delete-action"><i class="ion-close-circled"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
