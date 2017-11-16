<?php

namespace App\Traits;

use Cviebrock\EloquentSluggable\Sluggable as SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

trait ModelableTrait
{
    use SluggableTrait, SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
