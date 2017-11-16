<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;
use App\Traits\ModelableTrait;

class Page extends Model
{
    use GetImageTrait, ModelableTrait;

    protected $fillable = [
        'ceo_title',
        'ceo_description',
        'ceo_keywords',
        'name',
        'slug',
        'image',
        'icon',
        'file',
        'create_dt',
        'description',
        'locked',
        'is_home',
        'attributes',
        'type',
    ];

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

    public function getIconDefaultAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->icon);
    }

    public function getIconThumbnailAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->icon, ['p' => 'thumbnail']);
    }

    public function getCreateDtAttribute($value)
    {
        return ($value) ? $this->asDateTime($value)->format(config('common.create_dt.format')) : null;
    }
}
