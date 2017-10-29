<div class="megamenu">
    <div class="megamenu-inner">
        <div class="owl-carousel owl-product">
            @if (count($boxCategory->limitPages))
            @foreach ($boxCategory->limitPages->chunk(2) as $chunks)
            <div class="item">
                @foreach ($chunks as $chunk)
                <div class="box text-center">
                    <a class="box-img" href="{{ route('page.show', $chunk->slug) }}" title="{{ $chunk->name }}">
                        <img class="img-responsive" src="{{ route('image', $chunk->image_thumbnail) }}" alt="{{ $chunk->name }}" />
                    </a>
                    <h4 class="box-title">
                        <a href="{{ route('page.show', $chunk->slug) }}" title="{{ $chunk->name }}">{{ $chunk->name }}</a>
                    </h4>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
