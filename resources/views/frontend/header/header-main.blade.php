<div class="menu-wrapper menu-sticky @if (isset($is_home)) menu-boxed @endif">
    <div class="@if (isset($is_home)) container @else container-full @endif">
        <div class="menu-container">
            <div class="@if (isset($is_home)) container-full @else container @endif">
                <div class="menuzord relative" id="menuzord">
                    <a class="menuzord-brand hidden-lg hidden-md" href="{{ route('home') }}">
                        <img src="{{ route('image', $configs['logo']) }}" alt="" />
                    </a>
                    <ul class="menuzord-menu">
                        <li {{ check_active(route('home')) }}>
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        @foreach ($__menus as $menu)
                            @if ($menu->type == 'post')
                            <li {{ check_active($menu->url) }}>
                                <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                                <div class="megamenu">
                                    <div class="megamenu-inner">
                                        <div class="megamenu-row new">
                                            @if (count($__categoryPosts))
                                            @foreach ($__categoryPosts as $categoryPost)
                                            <div class="col4 col-border">
                                                <h4 class="title-new"><a href="{{ route('category.show', $categoryPost->slug) }}">{{ $categoryPost->name }}</a></h4>
                                                <div class="owl-carousel owl-new">
                                                    @if ($categoryPost->limitPosts)
                                                    @foreach($categoryPost->limitPosts->chunk(5) as $chunks)
                                                    <div class="item">
                                                        @foreach($chunks as $chunk)
                                                        <a class="item-new" href="{{ route('post.show', $chunk->slug) }}">
                                                            <img src="{{ route('image', $chunk->image_100x70) }}" alt="" />
                                                            <div class="info">
                                                                <h5>{{ $chunk->name }}</h5>
                                                            </div>
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li {{ check_active($menu->url) }}>
                                <a href="{{ $menu->url }}">{{ $menu->name}}</a>
                                @include('frontend.header._box-menu', ['boxMenu' => $menu])
                            </li>
                            @endif
                        @endforeach
                        <li {{ check_active(route('home.page.contact')) }}>
                            <a href="{{ route('home.page.contact') }}">{{ __('repositories.title.contact') }}</a>
                            <div class="megamenu">
                                <div class="megamenu-inner">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4">
                                            <h4 class="heading color">Thông tin</h4>
                                            <!-- Contact form-->
                                            {{ Form::open([
                                                'url' => route('home.contact'),
                                                'class' => 'contact-form',
                                                'autocomplete'=>'off',
                                            ]) }}
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Họ và tên" name="name" />
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Email" name="email" />
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Số điện thoại" name="phone" />
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Nhập nội dung" name="description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit">Gửi</button>
                                                </div>
                                            {{ Form::close() }}
                                        </div>
                                        <div class="col-md-8 col-lg-8">
                                            <iframe style="width:100%;height:374px;border:0;" src="{{ $configs['map'] }}" allowfullscreen="allowfullscreen"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
