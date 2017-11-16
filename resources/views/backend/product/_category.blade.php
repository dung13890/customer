<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">{{ __('repositories.category.name') }}</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
