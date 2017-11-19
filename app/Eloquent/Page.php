<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;
use App\Traits\ModelableTrait;

class Page extends Model
{
    use GetImageTrait, ModelableTrait;

    protected $casts = [
        'attributes' => 'json'
    ];

    protected $fillable = [
        'ceo_title',
        'ceo_description',
        'ceo_keywords',
        'name',
        'slug',
        'image',
        'file',
        'create_dt',
        'description',
        'locked',
        'is_home',
        'is_comment',
        'attributes',
        'category_id',
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

    public function scopeByCategory($query, $param)
    {
        return $query->where('category_id', $param);
    }

    public function getCreateDtAttribute($value)
    {
        return ($value) ? $this->asDateTime($value)->format(config('common.create_dt.format')) : null;
    }
}
