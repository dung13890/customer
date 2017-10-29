<?php

namespace App\Traits;

use Cviebrock\EloquentSluggable\Sluggable as SluggableTrait;

trait ModelableTrait
{
    use SluggableTrait;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
