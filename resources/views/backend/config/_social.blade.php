<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">{{ __('repositories.title.social') }}</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('facebook', 'Facebook', ['class'=>'control-label']) }}
            {{ Form::text('facebook', $items->keyBy('key')['facebook']['value'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('youtube', 'Youtube', ['class'=>'control-label']) }}
            {{ Form::text('youtube', $items->keyBy('key')['youtube']['value'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('whatsapp', 'Whatsapp', ['class'=>'control-label']) }}
            {{ Form::text('whatsapp', $items->keyBy('key')['whatsapp']['value'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('twitter', 'Twitter', ['class'=>'control-label']) }}
            {{ Form::text('twitter', $items->keyBy('key')['twitter']['value'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('instagram', 'Instagram', ['class'=>'control-label']) }}
            {{ Form::text('instagram', $items->keyBy('key')['instagram']['value'], ['class' => 'form-control']) }}
        </div>
    </div>
</div>
