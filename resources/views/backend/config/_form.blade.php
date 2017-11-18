@push('prescripts')
{{ Html::script(mix('/assets/js/backend/summernote.min.js')) }}
{{ Html::script(mix('/assets/js/backend/modules/config.js')) }}
    <script>
        $(function () {
            window.flash_message = '{!! session("flash_message") !!}';
            window.config.form();
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/config.css') }}
@endpush

@include('backend._partials.components.errors')
<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('name', $items->keyBy('key')['name']['value'], ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6">
                    {{ Form::label('email', __('repositories.label.email'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('email', $items->keyBy('key')['email']['value'], ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    {{ Form::label('phone', __('repositories.label.phone'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('phone', $items->keyBy('key')['phone']['value'], ['class' => 'form-control']) }}
                </div>
                <div class="col-md-4">
                    {{ Form::label('hotline', __('repositories.label.hotline'), ['class'=>'control-label']) }}
                    {{ Form::text('hotline', $items->keyBy('key')['hotline']['value'], ['class' => 'form-control']) }}
                </div>
                <div class="col-md-4">
                    {{ Form::label('fax', __('repositories.label.fax'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('fax', $items->keyBy('key')['fax']['value'], ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('factory', __('repositories.label.factory'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('factory', $items->keyBy('key')['factory']['value'], ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6">
                    {{ Form::label('copyright', __('repositories.label.copyright'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('copyright', $items->keyBy('key')['copyright']['value'], ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('address', __('repositories.label.address'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::text('address', $items->keyBy('key')['address']['value'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('introduce', __('repositories.label.introduce'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::textarea('introduce', $items->keyBy('key')['introduce']['value'], ['class' => 'form-control textarea-summernote', 'rows' => 3]) }}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('map', __('repositories.label.map'), ['class'=>'control-label']) }}
                    {{ Form::text('map', $items->keyBy('key')['map']['value'], ['class' => 'form-control']) }}
                    <iframe frameborder="0" style="width:100%;height:100px;border:0;" src="{{ $items->keyBy('key')['map']['value'] }}" allowfullscreen="allowfullscreen"></iframe>
                </div>
                <div class="col-md-6">
                    {{ Form::label('name', __('repositories.label.logo'), ['class' => 'control-label']) }}
                    @component('backend._partials.components.uploadfile', ['imgFields' => $items->keyBy('key')['logo']['logo'] ?? null])
                    @slot('uploadFields')
                        {{ Form::file('logo', ['id' => 'image']) }}
                    @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('popup_title', __('repositories.label.popup_title'), ['class'=>'control-label']) }}
            {{ Form::text('popup_title', $items->keyBy('key')['popup_title']['value'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('popup_description', __('repositories.label.popup_description'), ['class'=>'control-label']) }}
            {{ Form::textarea('popup_description', $items->keyBy('key')['popup_description']['value'], ['class' => 'form-control', 'rows' => 5]) }}
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label></label>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('popup_disp_flg', true, (int)$items->keyBy('key')['popup_disp_flg']['value'], ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.popup_disp_flg') }}</b>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label></label>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('popup_img_flg', true, $items->keyBy('key')['popup_img_flg']['value'], ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.popup_img_flg') }}</b>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    {{ Form::label('name', __('repositories.label.popup_img'), ['class' => 'control-label']) }}
                    @component('backend._partials.components.uploadfile', ['imgFields' => $items->keyBy('key')['popup_img']['popup_img'] ?? null, 'elementFields' => 'popup_img-upload'])
                    @slot('uploadFields')
                        {{ Form::file('popup_img', ['id' => 'popup_img']) }}
                    @endslot
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('popup_url', __('repositories.label.popup_url'), ['class'=>'control-label']) }}
            {{ Form::text('popup_url', $items->keyBy('key')['popup_url']['value'], ['class' => 'form-control', 'placeholder' => 'https://']) }}
        </div>
        <hr>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-warning btn-sm"><i class="ion-trash-b"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.cache_clear') }}</button>
            <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.edit') }}</button>
        </div>
    </div>
    <div class="col-sm-4">
        @include('backend.config._seo')
        @include('backend.config._social')
        @include('backend.config._scripts')
    </div>
</div>
