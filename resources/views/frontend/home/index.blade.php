@extends('layouts.frontend')

@section('page-content')
<section class="home-slideshow clearfix" id="home-slideshow">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="el-slideshow slider-main" id="js-slider-main">
                    @foreach ($slides as $slide)
                    <div class="item">
                        <img src="{{ route('image', $slide->image_1170x445) }}" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-intro clearfix" id="home-intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                {!! $configs['introduce'] !!}
            </div>
        </div>
    </div>
</section>
<section class="home-categories mb-30 clearfix" id="home-categories">
    <div class="container">
        <div class="row">
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>Sản phẩm nổi bật</span>
                    </h2>
                    <div class="category-image">
                        <a href="category-bon-cong-nghiep.html">
                            <img class="img-responsive" src="images/category-may-nang-luong.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>Bồn nước Inox</span>
                    </h2>
                    <div class="category-image">
                        <a href="category-bon-nuoc-inox.html">
                            <img class="img-responsive" src="images/category-bon-nuoc-inox.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>Chậu rửa Inox</span>
                    </h2>
                    <div class="category-image">
                        <a href="category.html">
                            <img class="img-responsive" src="images/category-chau-rua-inox.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>Bồn nhựa cao cấp</span>
                    </h2>
                    <div class="category-image">
                        <a href="category-bon-nhua-cao-cap.html">
                            <img class="img-responsive" src="images/category-bon-nhua-cao-cap.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>Máy lọc nước</span>
                    </h2>
                    <div class="category-image">
                        <a href="category.html">
                            <img class="img-responsive" src="images/category-may-loc-nuoc.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>Bình nước nóng</span>
                    </h2>
                    <div class="category-image">
                        <a href="category.html">
                            <img class="img-responsive" src="images/category-binh-nuoc-nong.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>Máy năng lượng</span>
                    </h2>
                    <div class="category-image">
                        <a href="category.html">
                            <img class="img-responsive" src="images/category-may-nang-luong.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>Bình nước nóng</span>
                    </h2>
                    <div class="category-image">
                        <a href="category.html">
                            <img class="img-responsive" src="images/category-binh-nuoc-nong.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <h2 class="category-name title-one">
                        <span>Bình nước nóng</span>
                    </h2>
                    <div class="category-image">
                        <a href="category.html">
                            <img class="img-responsive" src="images/category-binh-nuoc-nong.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-news mb-30 clearfix" id="home-news">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mb-20">
                <div class="title-one">
                    <h2>Tin tức & sự kiện</h2>
                </div>
                <div class="box-list news-block mb-15">
                    <div class="media">
                        <div class="media-left">
                            <a class="box-list-img" href="single.html" target="_blank" title="">
                                <img class="img-responsive" src="images/nw1.png" alt="" />
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="box-list-title">
                                <a href="single.html" target="_blank" title="">Toàn Thắng ra mắt dòng sản phẩm Chậu rửa Inox cao cấp</a>
                            </h4>
                        </div>
                    </div>
                    <p class="box-list-info mt-10">Sáng ngày 14/07/2017, tại Hà Nội, công ty cổ phần Toàn Thắng đã tổ chức thành công Lễ ra mắt dòng sản phẩm Chậu rửa Inox cao cấp Toàn Thắng.</p>
                </div>
                <div class="news-links list-links">
                    <a href="single.html" target="_blank" title="">Nhu cầu xây dựng phục hồi, ngành thép trong nước có dấu hiệu khởi sắc.</a>
                    <a href="single.html" target="_blank" title="">Lễ ra mắt giới thiệu sản phẩm chậu rửa Toàn Thắng với công nghệ sản xuất hiện đại.</a>
                    <a href="single.html" target="_blank" title="">Diễn tập PCCC & CHCN tại nhà máy Toàn Thắng tháng 9 năm 2017</a>
                    <a href="single.html" target="_blank" title="">Nhu cầu xây dựng phục hồi, ngành thép trong nước có dấu hiệu khởi sắc.</a>
                    <a href="single.html" target="_blank" title="">Đẩy mạnh chất lượng cán bộ công nhân viên, nâng cao năng lực sản xuất tại Toàn Thắng.</a>
                    <a href="single.html" target="_blank" title="">Nhu cầu xây dựng phục hồi, ngành thép trong nước có dấu hiệu khởi sắc.</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mb-20">
                <div class="title-one">
                    <h2>Công nghệ & Dự án</h2>
                </div>
                <div class="box-list news-block mb-15">
                    <div class="media">
                        <div class="media-left">
                            <a class="box-list-img" href="single.html" target="_blank" title="">
                                <img class="img-responsive" src="images/nw1.png" alt="" />
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="box-list-title">
                                <a href="single.html" target="_blank" title="">Toàn Thắng ra mắt dòng sản phẩm Chậu rửa Inox cao cấp</a>
                            </h4>
                        </div>
                    </div>
                    <p class="box-list-info mt-10">Sáng ngày 14/07/2017, tại Hà Nội, công ty cổ phần Toàn Thắng đã tổ chức thành công Lễ ra mắt dòng sản phẩm Chậu rửa Inox cao cấp Toàn Thắng.</p>
                </div>
                <div class="box-list news-block mb-15">
                    <div class="media">
                        <div class="media-left">
                            <a class="box-list-img" href="single.html" target="_blank" title="">
                                <img class="img-responsive" src="images/nw1.png" alt="" />
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="box-list-title">
                                <a href="single.html" target="_blank" title="">Toàn Thắng ra mắt dòng sản phẩm Chậu rửa Inox cao cấp</a>
                            </h4>
                        </div>
                    </div>
                    <p class="box-list-info mt-10">Sáng ngày 14/07/2017, tại Hà Nội, công ty cổ phần Toàn Thắng đã tổ chức thành công Lễ ra mắt dòng sản phẩm Chậu rửa Inox cao cấp Toàn Thắng.</p>
                </div>
                <div class="box-list news-block mb-15">
                    <div class="media">
                        <div class="media-left">
                            <a class="box-list-img" href="single.html" target="_blank" title="">
                                <img class="img-responsive" src="images/nw1.png" alt="" />
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="box-list-title">
                                <a href="single.html" target="_blank" title="">Toàn Thắng ra mắt dòng sản phẩm Chậu rửa Inox cao cấp</a>
                            </h4>
                        </div>
                    </div>
                    <p class="box-list-info mt-10">Sáng ngày 14/07/2017, tại Hà Nội, công ty cổ phần Toàn Thắng đã tổ chức thành công Lễ ra mắt dòng sản phẩm Chậu rửa Inox cao cấp Toàn Thắng.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 mb-20">
                <div class="title-one">
                    <h2>Công nghệ & Dự án</h2>
                </div>
                <div class="box-list news-block mb-15">
                    <div class="media">
                        <div class="media-left">
                            <a class="box-list-img" href="single.html" target="_blank" title="">
                                <img class="img-responsive" src="images/nw1.png" alt="" />
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="box-list-title">
                                <a href="single.html" target="_blank" title="">Toàn Thắng ra mắt dòng sản phẩm Chậu rửa Inox cao cấp</a>
                            </h4>
                        </div>
                    </div>
                    <p class="box-list-info mt-10">Sáng ngày 14/07/2017, tại Hà Nội, công ty cổ phần Toàn Thắng đã tổ chức thành công Lễ ra mắt dòng sản phẩm Chậu rửa Inox cao cấp Toàn Thắng.</p>
                </div>
                <div class="box-list news-block mb-15">
                    <div class="media">
                        <div class="media-left">
                            <a class="box-list-img" href="single.html" target="_blank" title="">
                                <img class="img-responsive" src="images/nw1.png" alt="" />
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="box-list-title">
                                <a href="single.html" target="_blank" title="">Toàn Thắng ra mắt dòng sản phẩm Chậu rửa Inox cao cấp</a>
                            </h4>
                        </div>
                    </div>
                    <p class="box-list-info mt-10">Sáng ngày 14/07/2017, tại Hà Nội, công ty cổ phần Toàn Thắng đã tổ chức thành công Lễ ra mắt dòng sản phẩm Chậu rửa Inox cao cấp Toàn Thắng.</p>
                </div>
                <div class="box-list news-block mb-15">
                    <div class="media">
                        <div class="media-left">
                            <a class="box-list-img" href="single.html" target="_blank" title="">
                                <img class="img-responsive" src="images/nw1.png" alt="" />
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="box-list-title">
                                <a href="single.html" target="_blank" title="">Toàn Thắng ra mắt dòng sản phẩm Chậu rửa Inox cao cấp</a>
                            </h4>
                        </div>
                    </div>
                    <p class="box-list-info mt-10">Sáng ngày 14/07/2017, tại Hà Nội, công ty cổ phần Toàn Thắng đã tổ chức thành công Lễ ra mắt dòng sản phẩm Chậu rửa Inox cao cấp Toàn Thắng.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-client-say mb-30 clearfix" id="home-client-say">
    <div class="container">
        <div class="title-one-full">
            <h2>Khách hàng nói gì về chúng tôi</h2>
        </div>
        <div class="row">
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <div class="category-image">
                        <a href="#">
                            <img class="img-responsive" src="images/category-may-nang-luong.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <div class="category-image">
                        <a href="#">
                            <img class="img-responsive" src="images/category-bon-nuoc-inox.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="xs-full col-xs-6 col-sm-6 col-md-6 col-lg-4 mb-30">
                <div class="category-item">
                    <div class="category-image">
                        <a href="#">
                            <img class="img-responsive" src="images/category-chau-rua-inox.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
