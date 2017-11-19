@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/slide.js')) }}
    <script>
        $(function () {
            window.slide.form();
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/slide.css') }}
@endpush

@include('backend._partials.components.errors')

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
        </div>
        @if ($type == 'page')
        <div class="col-md-4">
            {{ Form::label('category_id', __('repositories.category.name'), ['class'=>'control-label']) }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
        </div>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            {{ Form::label('name', __('repositories.label.description'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('repositories.label.description')]) }}
        </div>
        <div class="col-sm-2">
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
    {{ Form::label('name', __('repositories.label.image'), ['class' => 'control-label']) }}
    @component('backend._partials.components.uploadfile', ['imgFields' => (isset($item) && $item->image) ? $item->image_1170x445 : null])
    @slot('uploadFields')
        {{ Form::file('image', ['id' => 'image']) }}
    @endslot
    @endcomponent
</div>
<div class="form-group">
    <div class="text-right">
        <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
        <a href="javascript:window.history.back()" class="btn btn-primary btn-sm" ><i class="ion-arrow-left-a"></i> {{ __('repositories.title.back') }}</a>
    </div>
</div>

