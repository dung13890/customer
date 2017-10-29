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
        'locked',
    ];

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orWhere('description', 'LIKE', "{$keywords}%");
    }
}
