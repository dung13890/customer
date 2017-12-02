@push('prescripts')
<script>
    var item = {!! $item or '{}' !!};
</script>
{{ Html::script(mix('/assets/js/backend/jquery-ui.min.js')) }}
{{ Html::script(mix('/assets/js/backend/summernote.min.js')) }}
{{ Html::script(mix('/assets/js/backend/grideditor.min.js')) }}
{{ Html::script(mix('/assets/js/backend/modules/product.js')) }}
{{ HTML::script(mix('assets/vue/dropzone.js')) }}
    <script>
        $(function () {
            window.product.form();
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/product.css') }}
@endpush

@include('backend._partials.components.errors')
<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
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
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('feature_1', __('repositories.label.feature_1'), ['class'=>'control-label']) }}
                    {{ Form::text('feature_1', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.feature_1')]) }}
                </div>

                <div class="col-md-6">
                    {{ Form::label('feature_2', __('repositories.label.feature_2'), ['class'=>'control-label']) }}
                    {{ Form::text('feature_2', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.feature_2')]) }}
                </div>
            </div>
        </div>
        <div class="form-group" id="dropzone-form">
            {{ Form::label('images[]', __('repositories.label.images')) }}
            <upload-image @if (isset($item)) :images="item.images" @endif></upload-image>
        </div>
        <div class="form-group">
            {{ Form::label('advantage', __('repositories.label.advantage'), ['class' => 'control-label']) }}
            <div class="grid-editor"></div>
            {{ Form::textarea('advantage', null, ['class' => 'form-control textarea-summernote']) }}
        </div>
        <div class="form-group">
            {{ Form::label('coordination', __('repositories.label.coordination'), ['class' => 'control-label']) }}
            {{ Form::textarea('coordination', null, ['class' => 'form-control textarea-summernote']) }}
        </div>
        <div class="form-group">
            {{ Form::label('information', __('repositories.label.information'), ['class' => 'control-label']) }}
            {{ Form::textarea('information', null, ['class' => 'form-control textarea-summernote']) }}
        </div>
        <div class="form-group">
            {{ Form::label('conduct', __('repositories.label.conduct'), ['class' => 'control-label']) }}
            {{ Form::textarea('conduct', null, ['class' => 'form-control textarea-summernote']) }}
        </div>
        <div class="form-group">
            {{ Form::label('produce', __('repositories.label.produce'), ['class' => 'control-label']) }}
            {{ Form::textarea('produce', null, ['class' => 'form-control textarea-summernote']) }}
        </div>
    </div>
    <div class="col-sm-4">
        {{ Form::label('name', __('repositories.label.image'), ['class' => 'control-label']) }}<span class="require">*</span>
        @component('backend._partials.components.uploadfile', ['imgFields' => (isset($item) && $item->image) ? $item->image_medium : null])
        @slot('uploadFields')
            {{ Form::file('image', ['id' => 'image']) }}
        @endslot
        @endcomponent
        @include('backend._partials.includes.seo')
        @include('backend.product._category')
        @include('backend._partials.includes.category', ['titleInclude' => __('repositories.text.show_in_category')])
    </div>
</div>

<div class="form-group">
    <div class="text-right col-sm-4 col-sm-offset-4">
        <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
        <a href="javascript:window.history.back()" class="btn btn-primary btn-sm" ><i class="ion-arrow-left-a"></i> {{ __('repositories.title.back') }}</a>
    </div>
</div>

