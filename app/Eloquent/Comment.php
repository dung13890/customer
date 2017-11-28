<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name', 'content', 'email', 'url', 'locked', 'is_read', 'commentable_type', 'commentable_id'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orWhere('email', 'LIKE', "{$keywords}%")
            ->orWhere('content', 'LIKE', "{$keywords}%");
    }

    public function scopeByType($query, $param)
    {
        return $query->where('commentable_type', $param);
    }
}
