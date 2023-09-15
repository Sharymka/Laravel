<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoriesTrait;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use CategoriesTrait;
    public function index() {

        return view('admin.categories.index')->with(['categories'=> $this->createCategories()]);
    }
    public function create() {
        return view('admin.categories.create');
    }

}
