<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable as SluggableTrait;
use App\Traits\GetImageTrait;

class Page extends Model
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
        'ceo_title',
        'ceo_description',
        'ceo_keywords',
        'name',
        'slug',
        'image',
        'description',
        'locked',
        'category_id',
    ];

    public function category()
    {
        $this->belongsTo(Category::class);
    }

    public function setCeoTitleAttribute($value)
    {
        $value ?? $this->name;
        $this->attributes['ceo_title'] = $value;
    }

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orWhere('description', 'LIKE', "{$keywords}%");
    }

    public function scopeByCategory($query, $param)
    {
        return $query->where('category_id', $param);
    }
}
