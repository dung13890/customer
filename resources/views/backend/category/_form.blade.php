@include('backend._partials.components.errors')
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
        </div>

        <div class="col-md-6">
            {{ Form::label('parent_id', __('repositories.label.root'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::select('parent_id', $listItems, null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('name', __('repositories.label.description'), ['class' => 'control-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => __('repositories.label.description')]) }}
</div>

<div class="form-group">
    {{ Form::label('name', __('repositories.category.banner'), ['class' => 'control-label']) }}
    @component('backend._partials.components.uploadfile', ['item' => $item ?? null])
    @slot('upload_fields')
        {{ Form::file('image', ['id' => 'image']) }}
    @endslot
    @endcomponent
</div>

<div class="form-group">
    <div class="checkbox">
        <label>
            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.locked') }}</b>
        </label>
    </div>
</div>

<div class="form-group text-right">
    <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
</div>
