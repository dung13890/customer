@include('backend._partials.components.errors')
<div class="form-group">
    <div class="row">
        <div class="col-md-8">
            {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
        </div>

        <div class="col-md-4">
            {{ Form::label('sort', __('repositories.label.sort'), ['class'=>'control-label']) }}
            {{ Form::number('sort', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.sort'), 'maxlength' => 2]) }}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-8">
            {{ Form::label('url', __('repositories.label.url'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.url')]) }}
        </div>
        <div class="col-sm-4">
            <label></label>
            <div class="checkbox">
                <label>
                    {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.locked') }}</b>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('type', __('repositories.label.type'), ['class'=>'control-label']) }}<span class="require">*</span>
    @foreach($types as $type)
    <div class="radio">
        <label>{{ Form::radio('type', $type['type'],  old ('type'), ['data-url' => $type['url']]) }} {{ $type['name'] }}</label>
    </div>
    @endforeach
</div>

@if(Gate::check('menu-create') || Gate::check('menu-edit'))
<div class="form-group text-right">
    <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
</div>
@endif
