<?php

use Illuminate\Http\Request;
use App\Contracts\Services\MediaInterface;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('image/{path?}', ['as' => 'image' , function (Request $request, MediaInterface $service, $path = null) {
    if (!$path) {
        return;
    }
    $params = $request->all();
    return $service->getReponseImage($path, $params);
}])->where('path', '(.*?)');

Route::group(['prefix' => '/', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('lien-he', 'HomeController@contact')->name('home.contact');
    Route::get('danh-muc/{slug}', 'CategoryController@show')->name('category.show');
    Route::get('trang/{slug}', 'PageController@show')->name('page.show');
    Route::get('menu/{type}', 'MenuController@index')->name('menu.index');
    Route::get('bai-viet/{slug}', 'PostController@show')->name('post.show');
    Route::get('san-pham/{slug}', 'ProductController@show')->name('product.show');
    Route::get('lien-he', 'HomeController@pageContact')->name('home.page.contact');
    Route::post('san-pham-tim-kiem', 'ProductController@search')->name('product.search');
});

Route::group(['namespace' => 'Backend'], function () {
    Auth::routes();
    Route::group(['prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth']], function () {
        Route::get('/', 'HomeController@index')->name('home.index');
        Route::post('summernote/image', 'HomeController@summernoteImage')->name('summernote.image');
        Route::resource('home', 'HomeController', [
            'except' => ['index', 'create', 'store', 'update', 'edit', 'destroy']
        ]);
        Route::post('home/{contact}', 'HomeController@destroy')->name('home.destroy');

        Route::resource('user', 'UserController', [
            'except' => ['destroy']
        ]);
        Route::post('user/{user}', 'UserController@destroy')->name('user.destroy');

        Route::resource('role', 'RoleController', [
            'except' => ['destroy']
        ]);
        Route::post('role/{role}', 'RoleController@destroy')->name('role.destroy');

        Route::resource('category', 'CategoryController', [
            'except' => ['index', 'create', 'show', 'destroy']
        ]);
        Route::post('category/{category}', 'CategoryController@destroy')->name('category.destroy');
        Route::get('category/type/{type}', 'CategoryController@type')->name('category.type');

        Route::resource('page', 'PageController', [
            'except' => ['destroy', 'index', 'create']
        ]);
        Route::get('page/type/{type}', 'PageController@type')->name('page.type');
        Route::get('page/create/{type}', 'PageController@create')->name('page.create.type');
        Route::post('page/{page}', 'PageController@destroy')->name('page.destroy');

        Route::resource('product', 'ProductController', [
            'except' => ['destroy']
        ]);
        Route::post('product/{product}', 'ProductController@destroy')->name('product.destroy');
        Route::post('product/image/store', 'ProductController@imageStore')->name('product.image.store');

        Route::resource('post', 'PostController', [
            'except' => ['destroy', 'index', 'create']
        ]);
        Route::get('post/type/{type}', 'PostController@type')->name('post.type');
        Route::get('post/create/{type}', 'PostController@create')->name('post.create.type');
        Route::post('post/{post}', 'PostController@destroy')->name('post.destroy');
        Route::resource('slide', 'SlideController', [
            'except' => ['destroy']
        ]);
        Route::post('slide/{slide}', 'SlideController@destroy')->name('slide.destroy');
        Route::resource('config', 'ConfigController', [
            'only' => ['index', 'store']
        ]);

        Route::resource('menu', 'MenuController', [
            'except' => ['show', 'create', 'destroy']
        ]);
        Route::post('menu/{menu}', 'MenuController@destroy')->name('menu.destroy');
    });
});
