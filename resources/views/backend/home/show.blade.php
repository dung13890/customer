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
                                <td>{{ __('repositories.label.email') }}</td>
                                <td>{{ $item->email }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('repositories.label.phone') }}</td>
                                <td>{{ $item->phone }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('repositories.label.description') }}</td>
                                <td>{{ $item->description }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
