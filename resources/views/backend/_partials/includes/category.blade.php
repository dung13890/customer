<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $titleInclude ?? __('repositories.category.name') }}</h3>
    </div>
    <div class="body">
        <div class="slim-scroll">
            <ul class="nav nav-stacked">
                @foreach ($rootCategories as $rootCategory)
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
                    @if (count($rootCategory->children))
                        @foreach ($rootCategory->children as $childrenCategory)
                        <?php
                            $childrenChecked = (isset($item) && isset($item->categories->keyBy('id')[$childrenCategory->id])) ? true : false;
                        ?>
                        <div class="container-fluid checkbox">
                            <label>
                                {{ Form::checkbox('category_ids[]', $childrenCategory->id, $childrenChecked, ['class' => 'children', 'data-parent' => $rootCategory->id]) }} - - {{ $childrenCategory->name }}
                            </label>
                        </div>
                        @endforeach
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
