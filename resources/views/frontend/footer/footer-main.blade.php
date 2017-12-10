<div class="footer-main">
    <div class="container">
        <div class="title-one-full">
            <h2>&nbsp;</h2>
        </div>
        <div class="row">
            @if (count($__categoryIntroduce))
            <div class="fmain-col col-xs-12 col-sm-6 col-md-2 col-lg-2">
                <div class="block footer-menu">
                    <h4 class="title">
                        <span>{{ str_limit(__('repositories.title.introduce'), 20) }}</span>
                    </h4>
                    <ul class="menu">
                        @foreach ($__categoryIntroduce->take(6) as $take)
                        <li class="limenu">
                            <a title="{{ $take->name }}" class="abmenu" href="{{ route('page.show', $take->slug) }}">
                                <span>{{ str_limit($take->name, 20) }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @if (count($__categoryProducts))
            <div class="fmain-col col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="block footer-menu">
                    <h4 class="title">
                        <span>{{ str_limit(__('repositories.title.product'), 20) }}</span>
                    </h4>
                    <ul class="menu">
                        @foreach ($__categoryProducts->take(6) as $take)
                        <li class="limenu">
                            <a title="{{ $take->name }}" class="abmenu" href="{{ route('category.show', $take->slug) }}">
                                <span>{{ str_limit($take->name, 20) }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @if (count($__categoryRecruitment))
            <div class="fmain-col col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="block footer-menu">
                    <h4 class="title">
                        <span>{{ str_limit(__('repositories.title.recruitment'), 20) }}</span>
                    </h4>
                    <ul class="menu">
                        @foreach ($__categoryRecruitment->take(6) as $take)
                        <li class="limenu">
                            <a title="{{ $take->name }}" class="abmenu" href="{{ route('page.show', $take->slug) }}">
                                <span>{{ str_limit($take->name, 20) }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <div class="fmain-col col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="block footer-about">
                    <img class="footer-logo img-responsive" src="{{ route('image', $configs['logo']) }}" alt="" />
                    <div class="about-content">
                        <div class="address">
                            <strong>{{ $configs['name'] }}</strong>
                            <br/>
                            <abbr title="{{ __('frontend.label.office') }}">{{ __('frontend.label.office') }}: </abbr>{{ $configs['address'] }}
                            <br/>
                            <abbr title="{{ __('frontend.label.manufactory') }}">{{ __('frontend.label.manufactory') }}: </abbr>{{ $configs['factory'] }}
                            <br/>
                            <abbr title="{{ __('frontend.label.phone') }}">{{ __('frontend.label.phone') }}: </abbr>{{ $configs['phone'] }} *
                            <abbr title="{{ __('frontend.label.fax') }}">{{ __('frontend.label.fax') }}: </abbr>{{ $configs['fax'] }}
                            <br/>
                            <abbr title="{{ __('frontend.label.email') }}">{{ __('frontend.label.email') }}: </abbr>{{ $configs['email'] }}
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
