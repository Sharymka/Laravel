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

//
//Route::get('/info', function (): string {
//    return "Страница с информацией о проекте";
//});



//
//Route::get('/news/{id}', [
//     \App\Http\Controllers\NewsController::class, 'news'])
//    ->name('news')
//    ->where('id', '\d+');

Route::get('/main', [App\Http\Controllers\MainController::class, 'index'])
    ->name('main');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'categories'])
    ->name('categories');

Route::get('/blockOfNews/{categoryName}', [
    \App\Http\Controllers\NewsController::class, 'blockOfNews'])
    ->name('blockOfNews');

Route::get('/news/showOne/{categotyName}/{newsId}', [\App\Http\Controllers\NewsController::class , 'showOne'])
->name('showOne')->where('newsId',"\d+");

//Route::get('/news/add', [
//    'uses' => '\App\Http\Controllers\NewsController@newsAdd',
//    'as' => 'newsAdd'
//]);

Route::get('/authorization',
    [App\Http\Controllers\AuthorizationController::class, 'authorization'])
    ->name('authorization');

Route::get('/test', function () {
    return 'такой ответ ..';
});

Route::group(
    [
        "prefix" => "admin",
//      "namespace" => "Admin",
        "as" => "admin."
    ],
    function () {
        Route::get('/', [
            'uses' => 'App\Http\Controllers\Admin\IndexController@index',
            'as' => "admin"]);
        Route::get('/test1', [
            'uses' => 'App\Http\Controllers\Admin\IndexController@test1',
            'as' => 'test1']);
        Route::get('/test2', [
            'uses' => 'App\Http\Controllers\Admin\IndexController@test2',
            'as' => 'test2']);
        Route::match(['get', 'post'], '/addNews', [
                'uses' => 'App\Http\Controllers\NewsController@addNews',
                'as' => 'addNews']
        );
    }
);

//Route::get('/welcome', [
//    'uses' => "App\Http\Controllers\WelcomeController@index",
//    'as' => 'welcome']);












