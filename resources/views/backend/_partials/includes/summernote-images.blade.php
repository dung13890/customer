<div class="modal fade" id="summernote-images" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ __('repositories.text.image_manager') }}</h4>
            </div>
            <div class="modal-body">
                <div id="images-thumb-summernote"></div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2">
                        {{ Form::selectYear('year', config('common.summernote_year.from'), config('common.summernote_year.to'), date('Y'), ['class' => 'form-control', 'id' => 'select-year']) }}
                    </div>
                    <div class="col-sm-3">
                        {{ Form::selectMonth('month', date('m'), ['class' => 'form-control', 'id' => 'select-month']) }}
                    </div>
                    <div class="col-sm-3">
                        {{ Form::select('folder', folder_images(), 'summernote', ['class' => 'form-control', 'id' => 'select-folder']) }}
                    </div>
                    <div class="col-sm-2">
                        <a id="get-images-summernote" class="btn btn-primary"><i class="ion-archive"></i> {{ __('repositories.text.get_images') }}</a>
                    </div>
                    <div class="col-sm-2 pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
