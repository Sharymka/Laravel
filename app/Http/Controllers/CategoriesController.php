<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {

        $categories = parent::getCategories();
        return view('news.categories', ['categories' => $categories]);
    }
}
