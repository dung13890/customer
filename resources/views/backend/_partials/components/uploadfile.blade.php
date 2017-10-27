<div class="input-group">
    <span class="input-group-btn">
        <span class="btn btn-default btn-file">
            {{ __('repositories.title.browse') }} {{ $upload_fields }}
        </span>
    </span>
    <input type="text" class="form-control" readonly>
</div>
{{ HTML::image( (isset($item) && $item->image ) ? route('image', $item->image_medium) :  null, '', ['id' => 'img-upload']) }}
