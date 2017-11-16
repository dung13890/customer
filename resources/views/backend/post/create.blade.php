@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.title.index'))

@section('page-content')
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $heading }} ( {{ __('repositories.title.' . $type) }} )</h3>
                </div>
                <div class="panel-body">
                    {{ Form::open([
                        'url' => route('backend.post.store'),
                        'role'  => 'form',
                        'files' => true,
                        'autocomplete'=>'off',
                    ]) }}
                        {{ Form::hidden('type', $type) }}
                        @include('backend.post._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
