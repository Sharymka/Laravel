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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin');
    Route::get('/test1', [App\Http\Controllers\Admin\IndexController::class, 'test1'])->name('test1');
    Route::get('/test2', [App\Http\Controllers\Admin\IndexController::class, 'test2'])->name('test2');
    Route::match(['get', 'post'], '/addNews', [App\Http\Controllers\NewsController::class, 'addNews'])->name('addNews');
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/blockOfNews/{categoryId}', [\App\Http\Controllers\NewsController::class, 'blockOfNews'])
        ->name('blockOfNews')->where('categoryId',"\d+");
    Route::get('/news/showOne/{categoryId}/{newsId}', [\App\Http\Controllers\NewsController::class , 'showOne'])
        ->name('showOne')->where('newsId',"\d+")->where('categoryId',"\d+");
    Route::match(['get', 'post'],'/blockOfNews/addNews', [App\Http\Controllers\NewsController::class, 'addNews'])
        ->name('addNews');
});

Route::get('/authorization',
    [App\Http\Controllers\AuthorizationController::class, 'authorization'])
    ->name('authorization');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'categories'])
    ->name('categories');












