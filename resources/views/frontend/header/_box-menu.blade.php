<div class="megamenu">
    <div class="megamenu-inner">
        <div class="owl-carousel owl-product">
            <?php
                switch ($boxMenu->type) {
                    case 'introduce':
                        $childrenMenus = $__categoryIntroduce;
                        break;
                    case 'distributor':
                        $childrenMenus = $__categoryDistributor;
                        $isDistributor = true;
                        break;
                    case 'recruitment':
                        $childrenMenus = $__categoryRecruitment;
                        break;
                    case 'investor':
                        $childrenMenus = $__categoryInvestor;
                        break;
                    case 'product':
                        $childrenMenus = $__categoryProducts;
                        break;
                    default:
                        $childrenMenus = null;
                        break;
                }
            ?>
            @if (count($childrenMenus))
            @foreach ($childrenMenus->chunk(2) as $chunks)
            <div class="item">
                @foreach ($chunks as $chunk)
                <div class="box text-center">
                    <a class="box-img" href="{{ isset($isDistributor) ? route('menu.index', [$chunk->type, $chunk->district_cd]) : route('category.show', $chunk->slug) }}" title="{{ $chunk->name }}">
                        <img class="img-responsive" src="{{ route('image', $chunk->icon_thumbnail ) }}" alt="{{ $chunk->name }}" />
                    </a>
                    <h4 class="box-title">
                        <a href="{{ isset($isDistributor) ? route('menu.index', [$chunk->type, $chunk->district_cd]) : route('category.show', $chunk->slug) }}" title="{{ $chunk->name }}">{{ str_limit($chunk->name, 40) }}</a>
                    </h4>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
