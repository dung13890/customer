<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">{{ __('repositories.title.ceo') }}</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('ceo_title', __('repositories.label.ceo_title'), ['class'=>'control-label']) }}
            {{ Form::text('ceo_title', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.ceo_title')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('ceo_keywords', __('repositories.label.ceo_keywords'), ['class'=>'control-label']) }}
            {{ Form::text('ceo_keywords', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.ceo_keywords')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('ceo_description', __('repositories.label.ceo_description'), ['class'=>'control-label']) }}
            {{ Form::textarea('ceo_description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('repositories.label.ceo_description')]) }}
        </div>
    </div>
</div>
