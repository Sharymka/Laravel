<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
    Route::get('/parser', \App\Http\Controllers\Admin\ParserController::class)->name('parser');
    Route::match(['get', 'post'], '/addNews', [AdminNewsController::class, 'addNews'])->name('addNews');
    Route::resource('/news', AdminNewsController::class);
    Route::get('/users/toggleAdmin/{user}', [UsersController::class, 'toggleAdmin'])->name('users.toggleAdmin');
    Route::resource('/users', UsersController::class);

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
    Route::match(['post'], '/categories/store', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{oneNews}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::match(['get', 'post', 'put'], '/categories/{categories}/update', [AdminCategoryController::class, 'update'])
         ->name('categories.update');
    Route::get('/categories/{categories}', [AdminCategoryController::class, 'show'])->name('categories.show');
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/categories', [App\Http\Controllers\NewsController::class, 'newsCategories'])
         ->name('categories');
    Route::get('/blockOfNews/{categoryId}', [\App\Http\Controllers\NewsController::class, 'blockOfNews'])
         ->name('blockOfNews')->where('categoryId', "\d+");;
    Route::get('/showOne/{categoryId}/{newsId}', [\App\Http\Controllers\NewsController::class, 'showOne'])
         ->name('showOne')->where('categoryId', "\d+")->where('newsId', "\d+");
    Route::match(['get', 'post'], '/blockOfNews/addNews', [App\Http\Controllers\NewsController::class, 'addNews'])
         ->name('addNews');
});

Route::get('/authorization',
    [App\Http\Controllers\AuthorizationController::class, 'authorization'])
     ->name('authorization');

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
//    ->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/vkontakte/redirect', [SocialProvidersController::class, 'redirect'])
         ->name('social-providers.redirect');

    Route::get('/vkontakte/callback', [SocialProvidersController::class, 'callback'])
         ->name('social-providers.callback');
});

Route::get('/github/redirectToGitHub', [LoginController::class, 'redirectToGitHub']);
Route::get('/github/callback', [LoginController::class, 'handleGitHubCallback']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test/{socUser}', [App\Http\Controllers\TestController::class, 'test'])->name('test');
//
//Route::get('/login', [App\Http\Controllers\Auth\LoginController::class , 'showLoginForm'])->name('login');
//Route::post('/login', [App\Http\Controllers\Auth\LoginController::class , 'login'])->name('login');
//
//Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class , 'logout'])->name('logout');
//
//Route::get('/password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
//Route::post('/password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm'])->name('password.confirm');
//
//Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
//
//Route::get('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
//Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
//Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//
//Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class , 'showRegistrationForm'])->name('register');
//Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class , 'register'])->name('register');
