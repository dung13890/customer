<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'description', 'locked'
    ];

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orWhere('email', 'LIKE', "{$keywords}%")
            ->orWhere('phone', 'LIKE', "{$keywords}%")
            ->orWhere('description', 'LIKE', "{$keywords}%");
    }
}
