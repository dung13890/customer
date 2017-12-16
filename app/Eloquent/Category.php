<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetImageTrait;
use App\Traits\ModelableTrait;

class Category extends Model
{
    use GetImageTrait, ModelableTrait;

    protected $fillable = [
        'name',
        'type',
        'description',
        'image',
        'banner',
        'is_home',
        'is_page',
        'icon',
        'sort',
        'is_redirect',
        'district_cd',
        'locked',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('updated_at', 'desc')->where('locked', false);
    }

    public function slides()
    {
        return $this->hasMany(Slide::class)->orderBy('updated_at', 'desc')->where('locked', false);
    }

    public function articles()
    {
        return $this->hasMany(Post::class)
            ->take(5)
            ->where('locked', false)
            ->orderBy('updated_at', 'desc')
            ->select(['name', 'image', 'slug']);
    }

    public function pages()
    {
        return $this->hasMany(Page::class)->where('locked', false)->orderBy('updated_at', 'desc');
    }

    public function products()
    {
        return $this->hasMany(Product::class)->where('locked', false)->orderBy('updated_at', 'desc');
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

    public function getIconThumbnailAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->icon, ['p' => 'thumbnail']);
    }

    public function getBanner1920x570Attribute($value)
    {
        return app()['glide.builder']->getUrl($this->banner, ['p' => '1920x570']);
    }
}
