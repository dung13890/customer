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
Route::get('image/{path}', ['as' => 'image' , function (Request $request, MediaInterface $service, $path) {
    $params = $request->all();
    return $service->getReponseImage($path, $params);
}])->where('path', '(.*?)');

Route::group(['namespace' => 'Backend'], function () {
    Auth::routes();
    Route::group(['prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth']], function () {
        Route::get('/', 'HomeController@index');

        Route::resource('user', 'UserController');
        Route::resource('category', 'CategoryController', [
            'except' => ['index', 'create', 'show', 'create']
        ]);
        Route::get('category/type/{type}', 'CategoryController@type')->name('category.type');
    });
});

Route::get('/', function () {
    return view('welcome');
});

