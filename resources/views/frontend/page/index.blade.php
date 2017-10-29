@extends('layouts.frontend')

@section('page-content')
    <div class="featured-image clearfix">
        <img class="img-responsive" src="images/banner-category.jpg" alt="" />
    </div>
    <div class="page-title-block mt-30 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="page-title title-one-full pl-50">
                        <span>Bản tin thời sự</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="single-product-container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="single-post-wrap">
                        <h1 class="post-title">{{ $item->name }}</h1>
                        <div class="post-content">
                            {!! $item->description !!}
                        </div>
                        <div class="fb-comments" data-href="https://nguyenduytu3i.github.io/" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
                <aside class="sidebar sidebar-blog col-xs-12 col-sm-12 col-md-4">
                    <div class="sidebar-inner">
                        <div class="block block-news">
                            <div class="block-content">
                                <div class="box-grid news-block mb-15">
                                    <a class="box-grid-img" href="single.html" title="">
                                        <img class="img-responsive" src="images/sp1.png" alt="">
                                    </a>
                                    <h4 class="box-grid-title">
                                        <a href="single.html" title="">Nhu cầu xây dựng phục hồi, ngành thép trong nước có dấu hiệu khởi sắc.</a>
                                    </h4>
                                    <p class="box-grid-info mt-10">Theo nhận định của Bộ Công Thương ngày 4.11, tình hình sản xuất thép trong nước tháng 10 và 10 tháng đầu năm đều tăng trưởng dương do tận dụng cơ hội từ việc Việt Nam áp dụng biện pháp tự vệ đối với thép dài
                                        và phôi thép.</p>
                                </div>
                                <div class="box-list news-block mb-15">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="single.html" target="_blank" title="">
                                                <img class="img-responsive" src="images/nw1.png" alt="">
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
                                                <img class="img-responsive" src="images/nw1.png" alt="">
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
                                                <img class="img-responsive" src="images/nw1.png" alt="">
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
                        <div class="block block-news">
                            <h3 class="block-title title-two">
                                <span>Dự án</span>
                            </h3>
                            <div class="block-content">
                                <div class="box-list undefined">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="#" target="_blank" title="">
                                                <img class="img-responsive" src="images/nw1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="box-list-title">
                                                <a href="#" target="_blank" title="">Toàn cảnh dây chuyền sản xuất tấm Panel cho bồn Inox công nghiệp dung tích lớn.</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-list undefined">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="#" target="_blank" title="">
                                                <img class="img-responsive" src="images/nw1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="box-list-title">
                                                <a href="#" target="_blank" title="">Kết nối đồng đội - Kỳ nghỉ hè gắn kết thành công của Toàn Thắng tại Cửa Lò - Nghệ An.</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-list undefined">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="#" target="_blank" title="">
                                                <img class="img-responsive" src="images/nw1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="box-list-title">
                                                <a href="#" target="_blank" title="">Lễ ra mắt sản phẩm chậu rửa Inox liền khối tại Tòa nhà số 8 Quan Trung, Hà Đông</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-list undefined">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="#" target="_blank" title="">
                                                <img class="img-responsive" src="images/nw1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="box-list-title">
                                                <a href="#" target="_blank" title="">Văn phòng làm việc Toàn Thắng - không gian mở cho những sáng tạo và thành công.</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
