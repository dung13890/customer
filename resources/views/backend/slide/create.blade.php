@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.title.index'))

@section('page-content')
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $heading }}</h3>
                </div>
                <div class="panel-body">
                    {{ Form::open([
                        'url' => route('backend.slide.store'),
                        'role'  => 'form',
                        'files' => true,
                        'autocomplete'=>'off',
                    ]) }}
                        @include('backend.slide._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
