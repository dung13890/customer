<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">{{ __('repositories.title.ceo') }}</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('keywords', __('repositories.label.ceo_keywords'), ['class'=>'control-label']) }}
            {{ Form::text('keywords', $items->keyBy('key')['keywords']['value'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('description', __('repositories.label.ceo_description'), ['class'=>'control-label']) }}
            {{ Form::textarea('description', $items->keyBy('key')['description']['value'], ['class' => 'form-control', 'rows' => 3]) }}
        </div>
    </div>
</div>
