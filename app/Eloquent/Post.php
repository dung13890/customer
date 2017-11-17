<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;
use App\Traits\ModelableTrait;

class Post extends Model
{
    use GetImageTrait, ModelableTrait;

    protected $fillable = [
        'ceo_title',
        'ceo_description',
        'ceo_keywords',
        'name',
        'slug',
        'image',
        'description',
        'is_comment',
        'type',
        'locked',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setCeoTitleAttribute($value)
    {
        $this->attributes['ceo_title'] = $value ?? $this->name;
    }

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orWhere('ceo_keywords', 'LIKE', "{$keywords}%")
            ->orWhere('description', 'LIKE', "{$keywords}%");
    }

    public function scopeByCategory($query, $param)
    {
        return $query->where('category_id', $param);
    }

    public function getImage100x70Attribute($value)
    {
        return app()['glide.builder']->getUrl($this->image, ['p' => '100x70']);
    }

    public function getImage156x100Attribute($value)
    {
        return app()['glide.builder']->getUrl($this->image, ['p' => '156x100']);
    }
}
