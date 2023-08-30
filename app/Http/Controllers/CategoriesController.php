<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {
//        $route = route('admin.index');
        $categories = parent::categories();
        dump($categories);
        if(!empty($categories)) {
            $html = '<ol>';
            foreach ($categories as $key => $category) {
                $html .= <<<php
            <li><a href = '/categories/{$category}'>{$category}</a></li><br>

            php;
            }
            $html.='</ol>';
            $html.='<a href = "/"> Переход на админ страницу</a>';
            return $html;
        }
        return null;
    }

    public function category($categoryName) {
        dump($categoryName);
        $route = route('categories');
        dump($route);
        $news = parent::category($categoryName);
        dump($news);
        $html = '<ol>';
        if (!empty($news)) {
            foreach ($news as $key => $OneNews) {
                $html .= <<<php
            <li>{$OneNews}</li><br>
            php;
            }
        $html.='</ol>';
        $html.= <<<php
        <h2>
            <a href ="{$route}"> Назад</a>
        </h2>
        php;
        return $html;
        }
        return redirect("{$route}");
    }
}
