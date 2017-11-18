<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Scripts</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('adwords_id', 'Google AdWords ID', ['class'=>'control-label']) }}
            {{ Form::text('adwords_id', $items->keyBy('key')['adwords_id']['value'], ['class' => 'form-control', 'placeholder' => 'Google Adwords Id']) }}
        </div>
        <div class="form-group">
            {{ Form::label('adwords_src', 'Google AdWords Src', ['class'=>'control-label']) }}
            {{ Form::textarea('adwords_src', $items->keyBy('key')['adwords_src']['value'], ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Google Adwords Src Img']) }}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('analytics_id', 'Google Analytics ID', ['class'=>'control-label']) }}
            {{ Form::text('analytics_id', $items->keyBy('key')['analytics_id']['value'], ['class' => 'form-control', 'placeholder' => 'Google Analytics Id']) }}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('vchat_hash', 'Vchat Hash', ['class'=>'control-label']) }}
            {{ Form::textarea('vchat_hash', $items->keyBy('key')['vchat_hash']['value'], ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'vchat_hash']) }}
            {{ Form::label('vchat_data', 'Vchat Data', ['class'=>'control-label']) }}
            {{ Form::textarea('vchat_data', $items->keyBy('key')['vchat_data']['value'], ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'vchat_data']) }}
        </div>
    </div>
</div>
