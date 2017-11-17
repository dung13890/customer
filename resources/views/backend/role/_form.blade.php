@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/role.js')) }}
    <script>
        $(function () {
            window.role.form();
        });
    </script>
@endpush

@include('backend._partials.components.errors')
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
        </div>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">{{ __('repositories.label.abilities') }}</h3>
            </div>
            <div class="body">
                <div class="slim-scroll">
                    <ul class="nav nav-stacked">
                        @foreach ($abilities as $key=>$group)
                        <li>
                            <label class="container-fluid"> {{ $key }}</label>
                            @foreach($group->pluck('name', 'id') as $id => $name)
                            <?php
                                $checked = (isset($item) && isset($item->abilities->keyBy('id')[$id])) ? true : false;
                            ?>
                            <div class="container-fluid checkbox">
                                <label>
                                    {{ Form::checkbox('ability_id[]', $id, $checked) }} {{ $name }}
                                </label>
                            </div>
                            @endforeach
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
