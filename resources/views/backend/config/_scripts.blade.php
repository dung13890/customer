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
            {{ Form::label('vchat', 'Vchat', ['class'=>'control-label']) }}
            {{ Form::textarea('vchat', $items->keyBy('key')['vchat']['value'], ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'vchat']) }}
        </div>
    </div>
</div>
