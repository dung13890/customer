@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="login">
                {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'card card-login']) !!}
                    <div class="card-block">
                        <h1 class="card-title">{{ __('repositories.title.login') }}</h1>
                        <p class="text-muted">{{ __('repositories.text.sign_in_to_acc') }}</p>

                        <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ion-ios-person-outline"></i></span>
                                {!! Form::text('username', null, ['placeholder' => __('repositories.label.username'), 'class' => 'form-control', 'autofocus']) !!}
                            </div>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ion-ios-locked-outline"></i></span>
                                {!! Form::password('password', ['placeholder' => __('repositories.label.password'), 'class' => 'form-control']) !!}
                            </div>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary">{{ __('repositories.button.login') }}</button>
                            </div>
                            <div class="col-xs-8 text-right">
                                <a href="{{ route('password.request') }}" class="btn btn-link">{{ __('repositories.button.forgot_password') }}</a>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <div class="card card-text hidden-xs">
                    <div class="card-block text-center">
                        <h2>Toàn Thắng</h2>
                        <p>{{ __('repositories.text.sign_in_to_info') }}</p>
                        <p>{{ __('repositories.text.sign_in_to_addr') }}</p>
                        <p>{{ __('repositories.text.sign_in_to_phon') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
