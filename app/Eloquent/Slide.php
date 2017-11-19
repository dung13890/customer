<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;

class Slide extends Model
{
    use GetImageTrait;

    protected $fillable = [
        'name',
        'description',
        'url',
        'image',
        'type',
        'category_id',
        'locked',
    ];

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orWhere('description', 'LIKE', "{$keywords}%");
    }

    public function getImage1170x445Attribute($value)
    {
        return app()['glide.builder']->getUrl($this->image, ['p' => '1170x445']);
    }

    public function getImage1920x570Attribute($value)
    {
        return app()['glide.builder']->getUrl($this->image, ['p' => '1920x570']);
    }
}
