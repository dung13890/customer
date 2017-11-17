<?php

namespace App\Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('username', 'LIKE', "{$keywords}%")
            ->orWhere('name', 'LIKE', "{$keywords}%")
            ->orWhere('email', 'LIKE', "{$keywords}%");
    }

    public function scopeByRole($query, $role)
    {
        return $query->whereHas('roles', function($q) use ($role) {
            $q->where('id', $role);
        });
    }
}
