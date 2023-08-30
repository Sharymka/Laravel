<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $route = route('admin.index');
        return <<<php
        <h1> Приветствие пользователя</h1>
        Тут какой-то текст</br>
        <a href = "{$route}"> Переход на админ страницу</a>
    php;
    }
}
