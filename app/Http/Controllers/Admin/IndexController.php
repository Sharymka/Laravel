<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class IndexController extends Controller
{
    public function index(){
     return view('admin.index');
    }

    public function test1(){
        $route = route('admin.index');
        dump($route);
        return <<<php
        <h1> test1</h1>
        <p style="color: red ">
            <a href = "{$route}">Назад</a><br>
        </p>
    php;
    }

    public function test2(){
        $route = route('admin.index');
        dump($route);
        return <<<php
        <h1> test2</h1>
        <p style="color: red ">
            <a href = "{$route}">Назад</a><br>
        </p>
    php;
    }
}
