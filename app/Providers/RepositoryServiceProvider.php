<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        'user' => [
            \App\Contracts\Repositories\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class,
        ],

        'category' => [
            \App\Contracts\Repositories\CategoryRepository::class,
            \App\Repositories\CategoryRepositoryEloquent::class,
        ],

        'page' => [
            \App\Contracts\Repositories\PageRepository::class,
            \App\Repositories\PageRepositoryEloquent::class,
        ],

        'post' => [
            \App\Contracts\Repositories\PostRepository::class,
            \App\Repositories\PostRepositoryEloquent::class,
        ],

        'product' => [
            \App\Contracts\Repositories\ProductRepository::class,
            \App\Repositories\ProductRepositoryEloquent::class,
        ],

        'slide' => [
            \App\Contracts\Repositories\SlideRepository::class,
            \App\Repositories\SlideRepositoryEloquent::class,
        ],

        'config' => [
            \App\Contracts\Repositories\ConfigRepository::class,
            \App\Repositories\ConfigRepositoryEloquent::class,
        ],

        'contact' => [
            \App\Contracts\Repositories\ContactRepository::class,
            \App\Repositories\ContactRepositoryEloquent::class,
        ],

        'image' => [
            \App\Contracts\Repositories\ImageRepository::class,
            \App\Repositories\ImageRepositoryEloquent::class,
        ],

        'menu' => [
            \App\Contracts\Repositories\MenuRepository::class,
            \App\Repositories\MenuRepositoryEloquent::class,
        ],

        'comment' => [
            \App\Contracts\Repositories\CommentRepository::class,
            \App\Repositories\CommentRepositoryEloquent::class,
        ],
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }
}
