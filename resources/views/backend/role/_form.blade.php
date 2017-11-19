@include('backend._partials.components.errors')
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
        </div>

        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">{{ __('repositories.label.abilities') }}</h3>
            </div>
            <div class="panel-body">
                @foreach ($abilities as $key=>$group)
                <label class="control-label"> {{ $key }}</label>
                <div class="form-group">
                    <div class="row">
                        @foreach($group->pluck('name', 'id') as $id => $name)
                        <?php
                            $checked = (isset($item) && isset($item->abilities->keyBy('id')[$id])) ? true : false;
                        ?>
                            <div class="col-sm-3">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('ability_ids[]', $id, $checked) }} {{ $name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
        </div>
    </div>
</div>
