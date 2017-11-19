@extends('layouts.backend')

@section('title', isset($heading) ? $heading : $exception->getMessage())

@section('page-content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">{{ $exception->getMessage() }}</div>
        <div class="panel-body">
            <h4>{{ $exception->getMessage() }}</h4>
        </div>
    </div>
</div>
@endsection
