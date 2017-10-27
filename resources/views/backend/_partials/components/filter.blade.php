<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    {{ $search_field }}
                </span>
                {{ Form::text('keywords', null, ['class' => 'form-control pull-right']) }}
            </div>
        </div>
    </div>

    {{ $filter_fields }}

    <div class="col-sm-4">
        <div class="form-group">
            <a id="search-form" href="#" class="btn btn-primary"><i class="ion-search"></i> {{ __('repositories.title.search') }}</a>
            <a id="reset-form" href="#" class="btn btn-danger"><i class="ion-refresh"></i> {{ __('repositories.title.reset') }}</a>
        </div>
    </div>
</div>
<hr>
