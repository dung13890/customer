<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\Urls\UrlBuilderFactory;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('vi');
        \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'dev') {
            $this->app->register(\Lord\Laroute\LarouteServiceProvider::class);
            $this->app->register(\Mariuzzo\LaravelJsLocalization\LaravelJsLocalizationServiceProvider::class);
        }

        $this->app->singleton('glide', function () {
            return ServerFactory::create([
                'source' => \Storage::disk('local')->getDriver(),
                'cache' => \Storage::disk('local')->getDriver(),
                'cache_path_prefix' => 'cache',
                'base_url' => null,
                'max_image_size' => 2000 * 2000,
                'presets' => [
                    'thumbnail' => [
                        'w' => 100,
                        'h' => 100,
                        'fit' => 'crop',
                    ],
                    'small' => [
                        'w' => 400,
                        'h' => 400,
                        'fit' => 'crop',
                    ],
                    'medium' => [
                        'w' => 640,
                        'h' => 480,
                        'fit' => 'crop',
                    ],
                    'large' => [
                        'w' => 800,
                        'h' => 600,
                        'fit' => 'crop',
                    ],
                    '100x70' => [
                        'w' => 100,
                        'h' => 70,
                        'fit' => 'crop',
                    ],
                    '156x100' => [
                        'w' => 156,
                        'h' => 100,
                        'fit' => 'crop',
                    ],
                    '1170x445' => [
                        'w' => 1170,
                        'h' => 445,
                        'fit' => 'crop',
                    ],
                    '1920x570' => [
                        'w' => 1920,
                        'h' => 570,
                        'fit' => 'crop',
                    ],
                ],
                'response' => new LaravelResponseFactory(),
            ]);
        });

        $this->app->singleton('glide.builder', function () {
            return UrlBuilderFactory::create(null, env('GLIDE_SIGNKEY'));
        });

        $this->app->bind(
            \App\Contracts\Services\MediaInterface::class,
            \App\Services\MediaService::class
        );

        $this->composers();
    }

    public function composers()
    {
        view()->composer('backend.*', function ($view) {
            $view->with('me', \Auth::guard('backend')->user());
            $view->with('countComment', Cache::remember('countComment', 60, function () {
                return app(\App\Contracts\Repositories\CommentRepository::class)->getCommentUnRead();
            }));
        });

        view()->composer('frontend.*', function ($view) {
            $view->with('configs', Cache::remember('configs', 60, function () {
                return app(\App\Contracts\Repositories\ConfigRepository::class)->getData()->each(function ($item) {
                    if ($item->key == 'logo') {
                        $item->value = $item->logo;
                    }
                    if ($item->key == 'popup_img') {
                        $item->value = $item->popup_img;
                    }
                })->pluck('value', 'key');
            }));
            $view->with('__menus', Cache::remember('__menus', 60, function () {
                return app(\App\Contracts\Repositories\MenuRepository::class)->getDataLimit(10, ['type', 'name', 'url', 'sort']);
            }));
            $view->with('__categoryIntroduce', Cache::remember('__categoryIntroduce', 60, function () {
                return app(\App\Contracts\Repositories\CategoryRepository::class)->getLimitByType('introduce', 16);
            }));
            $view->with('__categoryDistributor', Cache::remember('__categoryDistributor', 60, function () {
                return app(\App\Contracts\Repositories\CategoryRepository::class)->getLimitByType('distributor', 16);
            }));
            $view->with('__categoryRecruitment', Cache::remember('__categoryRecruitment', 60, function () {
                return app(\App\Contracts\Repositories\CategoryRepository::class)->getLimitByType('recruitment', 16);
            }));
            $view->with('__categoryInvestor', Cache::remember('__categoryInvestor', 60, function () {
                return app(\App\Contracts\Repositories\CategoryRepository::class)->getLimitByType('investor', 16);
            }));
            $view->with('__categoryPosts', Cache::remember('__categoryPosts', 60, function () {
                return app(\App\Contracts\Repositories\CategoryRepository::class)->getLimitByType('post', 3);
            }));
            $view->with('__categoryProducts', Cache::remember('__categoryProducts', 60, function () {
                return app(\App\Contracts\Repositories\CategoryRepository::class)->getLimitByType('product', 16);
            }));
        });
    }

}
