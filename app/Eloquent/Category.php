<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable as SluggableTrait;
use App\Traits\GetImageTrait;

class Category extends Model
{
    use SluggableTrait, GetImageTrait;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name', 'parent_id', 'type', 'description', 'image', 'banner', 'locked'
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function getBannerDefaultAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->banner);
    }

    public function pages()
    {
        return $this->hasMany(Page::class)->where('locked', false)->orderBy('updated_at');
    }
}
