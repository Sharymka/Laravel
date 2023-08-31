<?php

use Illuminate\Support\Facades\Route;

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
     \App\Http\Controllers\NewsController::class, 'index'])
    ->name('news');

Route::get('/news/{id}/show', [\App\Http\Controllers\NewsController::class , 'showOne'])
->name('showOne')->where('id', "\d+");

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::get('/main', [App\Http\Controllers\MainController::class, 'index'])
    ->name('main');

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






