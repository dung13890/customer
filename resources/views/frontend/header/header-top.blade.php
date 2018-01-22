<div class="header-top clearfix hidden-xs hidden-sm" id="header-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="logo logo-home text-center">
                    <h1>
                        <a href="{{ route('home') }}" target="_self" title="">
                            <img class="img-responsive" src="{{ route('image', $configs['logo']) }}" alt="" />
                        </a>
                    </h1>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
