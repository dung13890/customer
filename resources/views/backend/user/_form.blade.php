@include('backend._partials.components.errors')
<div class="form-group">
    <label class="col-sm-3 control-label">{{ __('repositories.label.name') }}<span class="require">*</span></label>
    <div class="col-sm-5">
        {{ Form::text('name', null, ['placeholder' => __('repositories.label.name'), 'class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">{{ __('repositories.label.username') }}<span class="require">*</span></label>
    <div class="col-sm-5">
        {{ Form::text('username', null, ['placeholder' => __('repositories.label.username'), 'class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">{{ __('repositories.label.email') }}<span class="require">*</span></label>
    <div class="col-sm-5">
        {{ Form::email('email', null, ['placeholder' => 'example@email.com', 'class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">{{ __('repositories.label.password') }}<span class="require">*</span></label>
    <div class="col-sm-5">
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('repositories.label.password')]) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">{{ __('repositories.label.password_confirmation') }}<span class="require">*</span></label>
    <div class="col-sm-5">
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => __('repositories.label.password_confirmation')]) }}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5 text-right">
        <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
        <a href="javascript:window.history.back()" class="btn btn-primary btn-sm" ><i class="ion-arrow-left-a"></i> {{ __('repositories.title.back') }}</a>
    </div>
</div>
