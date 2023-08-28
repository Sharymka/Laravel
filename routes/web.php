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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello/{name}', function (string $name): string {
    return "Hello, {$name}";
});


Route::get('/info', function (): string {
    return "Страница с информацией о проекте";
});


Route::get('/news', function (): string {
    return "Страница для вывода нескольких новостей";
});

Route::get('/news/{id}', function (int $id): string {
    return "Страницa для вывода одной новости: $id";
});
