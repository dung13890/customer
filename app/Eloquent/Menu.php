<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name', 'url', 'sort', 'locked', 'type'
    ];
}
