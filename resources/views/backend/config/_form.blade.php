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
                <div class="col-md-6">
                    {{ Form::label('phone', __('repositories.label.phone'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('phone', $items->keyBy('key')['phone']['value'], ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6">
                    {{ Form::label('fax', __('repositories.label.fax'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('fax', $items->keyBy('key')['fax']['value'], ['class' => 'form-control']) }}
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
                    {{ Form::label('slogan', __('repositories.label.slogan'), ['class'=>'control-label']) }}
                    {{ Form::text('slogan', $items->keyBy('key')['slogan']['value'], ['class' => 'form-control']) }}
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

        <div class="form-group text-right">
            <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
        </div>
    </div>
    <div class="col-sm-4">
        @include('backend.config._seo')
        @include('backend.config._social')
    </div>
</div>
