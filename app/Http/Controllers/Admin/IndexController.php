<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class IndexController extends Controller
{
    public function index(){
     return \view('admin.admin');
//        return <<<php
//        <h1> точка входа админа</h1>
//        Тут какой-то текст</br>
//        <p style="color: red ">
//            <a href = "{$route1}">test1</a><br>
//            <a href = "{$route2}">test2</a><br>
//        </p>
//        <a href = "/"> Переход на главную страницу</a>
//    php;
    }
    public function test1(){
        $route = route('admin.admin');
        dump($route);
        return <<<php
        <h1> test1</h1>
        <p style="color: red ">
            <a href = "{$route}">Назад</a><br>
        </p>
    php;
    }

    public function test2(){
        $route = route('admin.admin');
        dump($route);
        return <<<php
        <h1> test2</h1>
        <p style="color: red ">
            <a href = "{$route}">Назад</a><br>
        </p>
    php;
    }
}
