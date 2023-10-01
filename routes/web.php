<?php

use App\Http\Controllers\Admin\AdminUsersController;
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

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/', [ App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
    Route::match(['get', 'post'], '/addNews', [AdminNewsController::class, 'addNews'])->name('addNews');
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/users', AdminUsersController::class);
//    Route::get('/news/index', [AdminNewsController::class, 'index'])->name('news.index');
//    Route::get('/news/create', [AdminNewsController::class, 'create'])->name('news.create');
//    Route::match(['get', 'post'],'/news/store', [AdminNewsController::class, 'store'])->name('news.store');
//    Route::get('/news/{oneNews}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
//    Route::get('/news/{oneNews}/delete', [AdminNewsController::class, 'edit'])->name('news.edit');
//    Route::match(['get', 'post', 'put'], '/news/{news}/update', [AdminNewsController::class, 'update'])->name('news.update');
//    Route::get('/news/{news}', [AdminNewsController::class, 'show'])->name('news.show');
//    Route::resource('/categories', AdminCategoryController::class);
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::match([ 'post'],'/categories/store', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{oneNews}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::match(['get', 'post', 'put'], '/categories/{categories}/update', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/{categories}', [AdminCategoryController::class, 'show'])->name('categories.show');
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/categories', [App\Http\Controllers\NewsController::class, 'newsCategories'])
        ->name('categories');
    Route::get('/blockOfNews/{categoryId}', [\App\Http\Controllers\NewsController::class, 'blockOfNews'])
        ->name('blockOfNews')->where('categoryId',"\d+");;
    Route::get('/showOne/{categoryId}/{newsId}', [\App\Http\Controllers\NewsController::class , 'showOne'])
        ->name('showOne')->where('categoryId',"\d+")->where('newsId',"\d+");
    Route::match(['get', 'post'],'/blockOfNews/addNews', [App\Http\Controllers\NewsController::class, 'addNews'])
        ->name('addNews');
});

Route::get('/authorization',
    [App\Http\Controllers\AuthorizationController::class, 'authorization'])
    ->name('authorization');


//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
//    ->name('home');















Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
