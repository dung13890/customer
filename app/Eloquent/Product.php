<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;
use App\Traits\ModelableTrait;

class Product extends Model
{
    use GetImageTrait, ModelableTrait;

    protected $fillable = [
        'ceo_title',
        'ceo_description',
        'ceo_keywords',
        'advantage',
        'coordination',
        'information',
        'conduct',
        'produce',
        'name',
        'slug',
        'image',
        'locked',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->where('type', 'product');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orWhere('ceo_keywords', 'LIKE', "{$keywords}%")
            ->orWhere('ceo_title', 'LIKE', "{$keywords}%");
    }

    public function scopeByCategory($query, $category)
    {
        return $query->whereHas('categories', function ($query) use ($category) {
            return $query->where('id', $category);
        });
    }
}
