<div id="fb-root"></div>
@if ($configs['popup_disp_flg'])
<div class="modal fade custom-modal" id="modal-onload" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        @if ($configs['popup_img_flg'])
        <div class="modal-content" style="background-image: url({{ route('image', $configs['popup_img']) }}); background-color: transparent !important; background-size: contain; background-repeat: no-repeat; box-shadow: none !important; -webkit-box-shadow : none !important;" >
            <div class="modal-body">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
        @else
        <div class="modal-content">
            <div class="modal-body">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3>{{ $configs['popup_title'] }}</h3>
                <p class="hidden-xs">{{ $configs['popup_description'] }}</p>
                {{ Form::open([
                    'url' => route('home.contact'),
                    'role'  => 'form',
                    'class' => 'contact-form',
                    'autocomplete'=>'off',
                ]) }}
                    <div class="form-group">
                        <input class="form-control" placeholder="Họ và tên" name="name" type="text" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Email" name="email" type="text" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Số điện thoại" name="phone" type="text" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" type="text" placeholder="Nhập nội dung" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Gửi</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        @endif
    </div>
</div>
@endif
