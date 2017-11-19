@push('prescripts')
{{ Html::script(mix('/assets/js/backend/summernote.min.js')) }}
{{ Html::script(mix('/assets/js/backend/modules/page.js')) }}
    <script>
        $(function () {
            window.attributeRecruitment = {!! (isset($item) && count($item->attributes))
                ? json_encode($item->attributes)
                : '[]' !!};
            window.page.form();
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/page.css') }}
@endpush

@include('backend._partials.components.errors')
<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
                </div>
                <div class="col-md-4">
                    {{ Form::label('create_dt', __('repositories.label.create_dt'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('create_dt', null, ['class' => 'form-control datetimepicker', 'placeholder' => config('common.create_dt.format')]) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-5">
                    {{ Form::label('icon', __('repositories.label.icon'), ['class' => 'control-label']) }}<span class="require">*</span>
                    @component('backend._partials.components.uploadfile',
                    ['imgFields' => (isset($item) && $item->icon) ? $item->icon_default : null, 'elementFields' => 'icon-upload']
                    )
                    @slot('uploadFields')
                        {{ Form::file('icon', ['id' => 'icon']) }}
                    @endslot
                    @endcomponent
                </div>
                <div class="col-sm-7">
                    {{ Form::label('image', __('repositories.label.image'), ['class' => 'control-label']) }}
                    @component('backend._partials.components.uploadfile', ['imgFields' => (isset($item) && $item->image) ? $item->image_medium : null])
                    @slot('uploadFields')
                        {{ Form::file('image', ['id' => 'image']) }}
                    @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {{ Form::label('pdf', __('repositories.label.pdf'), ['class' => 'control-label']) }}
                    {{ Form::file('file', ['id' => 'file']) }}
                    @if (isset($item) && $item->file)
                    <a href="#">{{ $item->file }}</a>
                    @endif
                </div>
                <div class="col-sm-3">
                    <label></label>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('is_home', true, old('is_home'), ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.is_home') }}</b>
                        </label>
                    </div>
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
            <div class="row">
                @if ( $type == 'recruitment')
                <div class="col-sm-8">
                    {{ Form::label('attributes', __('repositories.label.attribute'), ['class'=>'control-label']) }}
                    <div class="row attributes-key-value">
                    </div>
                    <a href="javascript:void(0)" id="btn-add-attribute" class="btn btn-success">{{ __('repositories.title.add') }}</a>
                </div>
                @endif
                <div class="col-sm-4">
                    <label></label>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('is_comment', true, old('is_comment'), ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.is_comment') }}</b>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        @include('backend._partials.includes.seo')
    </div>
</div>
<div class="form-group">
    {{ Form::label('description', __('repositories.label.description'), ['class' => 'control-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control textarea-summernote']) }}
</div>

<div class="form-group">
    <div class="text-right">
        <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
        <a href="javascript:window.history.back()" class="btn btn-primary btn-sm" ><i class="ion-arrow-left-a"></i> {{ __('repositories.title.back') }}</a>
    </div>
</div>

