<div class="footer-main">
    <div class="container">
        <div class="title-one-full">
            <h2>&nbsp;</h2>
        </div>
        <div class="row">
            @if (count($__pageIntroduce))
            @foreach ($__pageIntroduce->chunk(6) as $chunks)
            <div class="fmain-col col-xs-12 col-sm-6 @if ($loop->last) col-md-2 col-lg-2 @else col-md-3 col-lg-3 @endif">
                <div class="block footer-menu">
                    <h4 class="title">
                        <span>{{ str_limit($chunks->first()->name, 20) }}</span>
                    </h4>
                    <ul class="menu">
                        @foreach ($chunks as $chunk)
                        <li class="limenu">
                            <a title="{{ $chunk->name }}" class="abmenu" href="{{ route('page.show', $chunk->slug) }}">
                                <span>{{ str_limit($chunk->name, 20) }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
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
