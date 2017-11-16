<div class="megamenu">
    <div class="megamenu-inner">
        <div class="owl-carousel owl-product">
            <?php
                switch ($boxMenu->type) {
                    case 'introduce':
                        $childrenMenus = $__pageIntroduce;
                        $type = 'page';
                        break;
                    case 'distributor':
                        $childrenMenus = $__pageDistributor;
                        $type = 'page';
                        break;
                    case 'recruitment':
                        $childrenMenus = $__pageRecruitment;
                        $type = 'page';
                        break;
                    case 'investor':
                        $childrenMenus = $__pageInvestor;
                        $type = 'page';
                        break;
                    case 'product':
                        $childrenMenus = $__categoryProducts;
                        $type = 'category';
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
                    <a class="box-img" href="{{ route($type . '.show', $chunk->slug) }}" title="{{ $chunk->name }}">
                        <img class="img-responsive" src="{{ route('image', $type == 'category' ? $chunk->image_thumbnail : $chunk->icon_thumbnail ) }}" alt="{{ $chunk->name }}" />
                    </a>
                    <h4 class="box-title">
                        <a href="{{ route($type . '.show', $chunk->slug) }}" title="{{ $chunk->name }}">{{ $chunk->name }}</a>
                    </h4>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
