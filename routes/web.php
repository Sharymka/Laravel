<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/hello/{name}', function (string $name): string {
    return "Hello, {$name}";
});


Route::get('/info', function (): string {
    return "Страница с информацией о проекте";
});

Route::get('/news/add', [
    'uses' => '\App\Http\Controllers\NewsController@newsAdd',
    'as' => 'newsAdd'
]);

Route::get('/news', [
    'uses' => '\App\Http\Controllers\NewsController@news',
    'as' => 'news'
]);

Route::get('/news/{id}/{name}.html', [
    'uses' => '\App\Http\Controllers\NewsController@newsOne',
    'as' => 'newsOne']);

Route::get('/', ['uses' => "App\Http\Controllers\HomeController@index"]);

Route::get('/welcome', [
    'uses' => "App\Http\Controllers\WelcomeController@index",
    'as' => 'welcome']);

Route::get('/categories', [
    'uses' => "App\Http\Controllers\CategoriesController@categories",
    'as' => 'categories']);

Route::get('/categories/{name}', [
    'uses' => "App\Http\Controllers\CategoriesController@category",
    'as' => 'category']);

Route::get('/signin', [
    'uses' => "App\Http\Controllers\AuthorizationController@signIn",
    'as' => 'signin']);

Route::group(
  [
      "prefix" => "admin",
//      "namespace" => "Admin",
      "as" => "admin."
  ],
    function () {
        Route::get('/', [
            'uses' => 'App\Http\Controllers\Admin\IndexController@index',
            'as' => "index"]);
        Route::get('/test1', [
            'uses' => 'App\Http\Controllers\Admin\IndexController@test1',
            'as' => 'test1']);
        Route::get('/test2', [
            'uses' => 'App\Http\Controllers\Admin\IndexController@test2',
            'as' => 'test2']);
    }
);

;






