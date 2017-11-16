@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.title.index'))

@section('page-content')
<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $heading }}</h3>
                </div>
                <div class="panel-body">
                    <table class ="table table-bordered">
                        <tbody>
                            <tr>
                                <td>{{ __('repositories.label.name') }}</td>
                                <td>{{ $item->name }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('repositories.label.username') }}</td>
                                <td>{{ $item->username }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('repositories.label.email') }}</td>
                                <td>{{ $item->email }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
