@include('backend._partials.components.errors')
<div class="form-group">
    <label class="col-sm-3 control-label">{{ __('repositories.label.name') }}</label>
    <div class="col-sm-3">
        {{ Form::text('name', null, ['placeholder' => __('repositories.label.name'), 'class' => 'form-control']) }}
    </div>
    <div class="col-sm-2">
        <div class="checkbox">
            <label>
                {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.locked') }}</b>
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">{{ __('repositories.label.email') }}</label>
    <div class="col-sm-5">
        {{ Form::email('email', null, ['placeholder' => 'example@email.com', 'class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">{{ __('repositories.label.content') }}</label>
    <div class="col-sm-5">
        {{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('repositories.label.content')]) }}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5 text-right">
        <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ __('repositories.title.edit') }}</button>
        <a href="javascript:window.history.back()" class="btn btn-primary btn-sm" ><i class="ion-arrow-left-a"></i> {{ __('repositories.title.back') }}</a>
    </div>
</div>
