<div class="header-top clearfix hidden-xs hidden-sm" id="header-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="logo logo-home text-center">
                    <a href="{{ route('home') }}" target="_self" title="">
                        <img class="img-responsive" src="{{ route('image', $configs['logo']) }}" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-9">
                <div class="header-static float-right">
                    <div class="lang d-b text-right">
                        <a class="d-ib" href="#">
                            <img class="lang-img" src="/images/uk.png" alt="" />
                        </a>
                    </div>
                    <div class="static-block">
                        <!-- Search form-->
                        {{ Form::open([
                            'url' => route('product.search'),
                            'role'  => 'form',
                            'class' => 'search-form d-ib float-right',
                            'autocomplete'=>'off',
                        ]) }}
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Tìm kiếm ..." name="keyword" />
                                <span class="input-group-btn">
                                    <button class="btn btn-search" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        {{ Form::close() }}
                        <ul class="menu-top list-inline d-ib float-right">
                            <li class="limenu">
                                <a class="abmenu" href="{{ route('category.show', $__categoryMenu->get(0)->slug) }}">
                                    <span>Về chúng tôi</span>
                                </a>
                            </li>
                            <li class="limenu">
                                <a class="abmenu" href="{{ route('category.show', $__categoryMenu->get(5)->slug) }}">
                                    <span>{{ $__categoryMenu->get(5)->name }}</span>
                                </a>
                            </li>
                            <li class="limenu">
                                <a class="abmenu" href="{{ route('category.show', $__categoryMenu->get(1)->slug) }}">
                                    <span>{{ $__categoryMenu->get(1)->name }}</span>
                                </a>
                            </li>
                            <li class="limenu">
                                <a class="abmenu" href="{{ route('category.show', $__categoryMenu->get(2)->slug) }}">
                                    <span>{{ $__categoryMenu->get(2)->name }}</span>
                                </a>
                            </li>
                            <li class="limenu">
                                <a class="abmenu" href="{{ route('category.show', $__categoryMenu->get(3)->slug) }}">
                                    <span>{{ $__categoryMenu->get(3)->name }}</span>
                                </a>
                            </li>
                            <li class="limenu">
                                <a class="abmenu" href="#">
                                    <span>Liên hệ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
