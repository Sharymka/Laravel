<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoriesTrait;
use Illuminate\Http\Request;

class NewsController
{
    use CategoriesTrait;

    public function index() {
        return view('admin.news.index');
    }

    public function store(Request $request) {
        $this->createCategories();
        dump($request);
    }

    public function update() {

    }

    public function create() {
        return view('admin.news.create');
    }

    public function show() {
        return view('admin.news.show');
    }
}
