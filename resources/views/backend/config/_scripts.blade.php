<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Scripts</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('analytics', 'Analytics', ['class'=>'control-label']) }}
            {{ Form::textarea('analytics', $items->keyBy('key')['analytics']['value'], ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'analytics']) }}
        </div>
        <div class="form-group">
            {{ Form::label('vchat_hash', 'Vchat Hash', ['class'=>'control-label']) }}
            {{ Form::textarea('vchat_hash', $items->keyBy('key')['vchat_hash']['value'], ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'vchat_hash']) }}
            {{ Form::label('vchat_data', 'Vchat Data', ['class'=>'control-label']) }}
            {{ Form::textarea('vchat_data', $items->keyBy('key')['vchat_data']['value'], ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'vchat_data']) }}
        </div>
    </div>
</div>
