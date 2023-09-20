<?php

use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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
    Route::get('/', [ App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
    Route::match(['get', 'post'], '/addNews', [AdminNewsController::class, 'addNews'])->name('addNews');
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/categories', AdminCategoryController::class);
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/categories', [App\Http\Controllers\NewsController::class, 'newsCategories'])
        ->name('categories');
    Route::get('/blockOfNews/{categorySlug}', [\App\Http\Controllers\NewsController::class, 'blockOfNews'])
        ->name('blockOfNews')->where('categorySlug',"\w+");
    Route::get('/showOne/{categorySlug}/{newsId}', [\App\Http\Controllers\NewsController::class , 'showOne'])
        ->name('showOne')->where('categorySlug',"\w+")->where('newsId',"\d+");
    Route::match(['get', 'post'],'/blockOfNews/addNews', [App\Http\Controllers\NewsController::class, 'addNews'])
        ->name('addNews');
});

Route::get('/authorization',
    [App\Http\Controllers\AuthorizationController::class, 'authorization'])
    ->name('authorization');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');














