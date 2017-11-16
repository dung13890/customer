<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $titleInclude ?? __('repositories.category.name') }}</h3>
    </div>
    <div class="body">
        <div class="slim-scroll">
            <ul class="nav nav-stacked">
                @foreach ($articleCategories as $rootCategory)
                <?php
                    $checked = (isset($item) && isset($item->categories->keyBy('id')[$rootCategory->id])) ? true : false;
                ?>
                @if ($loop->first) <?php $checked = true ?> @endif
                <li>
                    <div class="container-fluid checkbox">
                        <label>
                            {{ Form::checkbox('category_ids[]', $rootCategory->id, $checked, ['class' => 'parent']) }} <b>{{ $rootCategory->name }}</b>
                        </label>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
