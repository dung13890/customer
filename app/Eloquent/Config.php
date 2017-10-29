<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'key', 'value'
    ];

    public function getLogoAttribute()
    {
        if ($this->key == 'logo') {
            return $this->value ? app()['glide.builder']->getUrl($this->value) : null;
        }
    }
}
