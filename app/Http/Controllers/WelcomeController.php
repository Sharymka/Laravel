<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
//        $route = route('admin.index');
        return <<<php
         <h1> Добро пожаловать в агрегатор новостей</h1>
        Тут какой-то текст</br>
    <a href =<?=route('')?>> Перейти</a>
    php;
    }
}
