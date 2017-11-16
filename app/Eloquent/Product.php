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
        'feature_1',
        'feature_2',
        'information',
        'conduct',
        'produce',
        'name',
        'slug',
        'image',
        'category_id',
        'locked',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->orderBy('categories.updated_at', 'desc')->where('type', 'article');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function setCeoTitleAttribute($value)
    {
        $this->attributes['ceo_title'] = $value ?? $this->name;
    }

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orWhere('ceo_keywords', 'LIKE', "{$keywords}%")
            ->orWhere('ceo_title', 'LIKE', "{$keywords}%");
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category_id', $category);
    }
}
