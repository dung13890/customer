<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;
use App\Traits\ModelableTrait;

class Category extends Model
{
    use GetImageTrait, ModelableTrait;

    protected $fillable = [
        'name', 'type', 'description', 'image', 'banner', 'is_home', 'locked'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('updated_at', 'desc')->where('locked', false);
    }

    public function articles()
    {
        return $this->hasMany(Post::class)
            ->take(5)
            ->orderBy('updated_at', 'desc')
            ->select(['name', 'image', 'slug']);
    }

    public function products()
    {
        return $this->hasMany(Product::class)->where('locked', false);
    }

    public function limitPosts()
    {
        return $this->posts()->take(15)->select(['image', 'name', 'slug']);
    }

    public function homePosts()
    {
        return $this->posts()->take(7)->select(['image', 'name', 'slug', 'ceo_description']);
    }

    public function getBannerDefaultAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->banner);
    }

    public function getImage156x100Attribute($value)
    {
        return app()['glide.builder']->getUrl($this->image, ['p' => '156x100']);
    }
}
