@extends('layouts.frontend')

@section('page-content')
    <div class="featured-image clearfix">
        <div class="container">
            <div class="featured-image clearfix">
                <img class="img-responsive" src="images/banner-category.jpg" alt="" />
            </div>
        </div>
    </div>
    <div class="page-title-block clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="page-title title-one-full">
                        <span>Chậu rửa INOX</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="single-product-container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="product-single-top">
                        <div class="product-gallery">
                            <div class="product-photo">
                                <div class="item">
                                    <img src="images/product-chau-rua-inox-1.jpg" alt="image">
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="item">
                                    <img src="images/product-chau-rua-inox-1-thumb.jpg" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-single-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active" role="presentation">
                                <a href="#product-info" aria-controls="product-info" role="tab" data-toggle="tab" aria-expanded="false">Thông số kỹ thuật</a>
                            </li>
                            <li role="presentation">
                                <a href="#setup-formality" aria-controls="setup-formality" role="tab" data-toggle="tab" aria-expanded="true">Các hình thức lắp đặt </a>
                            </li>
                            <li role="presentation">
                                <a href="#setup-step" aria-controls="setup-step" role="tab" data-toggle="tab" aria-expanded="false">Các bước lắp đặt</a>
                            </li>
                            <li role="presentation">
                                <a href="#product-process" aria-controls="product-process" role="tab" data-toggle="tab" aria-expanded="false">Dây chuyền sản xuất</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-info" role="tabpanel">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                                    it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <p>
                                    <img src="images/chart.jpg">
                                </p>
                            </div>
                            <div class="tab-pane" id="setup-formality" role="tabpanel">
                                <p>Noi dung - Cac hinh thuc lap dat.</p>
                            </div>
                            <div class="tab-pane" id="setup-step" role="tabpanel">
                                <p>Noi dung - Cac buoc lap dat.</p>
                            </div>
                            <div class="tab-pane" id="product-process" role="tabpanel">
                                <p>Noi dung - Day chuyen san xuat.</p>
                            </div>
                        </div>
                        <div class="fb-comments" data-href="https://nguyenduytu3i.github.io/" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
                <aside class="sidebar sidebar-shop col-xs-12 col-sm-12 col-md-4">
                    <div class="sidebar-inner">
                        <div class="block block-news">
                            <h3 class="block-title title-two">
                                <span>Chính sách bảo hành & lắp đặt</span>
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
                                                <a href="#" target="_blank" title="">Chính sách bảo hành</a>
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
                                                <a href="#" target="_blank" title="">Chính sách lắp đặt</a>
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
                                                <a href="#" target="_blank" title="">Dây chuyền sản xuất</a>
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
                        <div class="block block-news">
                            <h3 class="block-title title-two">
                                <span>Thông tin hữu ích</span>
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
                                                <a href="#" target="_blank" title="">Lý do lựa chọn và giải pháp</a>
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
                                                <a href="#" target="_blank" title="">So sánh bể nước bê tông với bồn nước công nghiệp Toàn Thắng</a>
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
                                                <a href="#" target="_blank" title="">Tính tối ưu về dung tích chứa nước</a>
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
                                                <a href="#" target="_blank" title="">Hỏi - đáp những vấn đề về giải pháp chứa nước cho các công trình .</a>
                                            </h4>
                                        </div>
                                    </div>
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