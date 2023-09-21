<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoriesTrait;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request) {

        $categories = Category::all();

//        $categories = DB::table('categories')->get();

        return view('admin.categories.index')->with(['categories'=> $categories, 'request'=>$request]);
    }

    public function create(Request $request) {

        return view('admin.categories.create')->with(['request'=>$request]);
    }

    public function store(Request $request, Category $categories) {

        $request->flash();

        $data = $request->only(['title', 'description', 'created_at']);

        $categories->fill($data);

        $categories = Category::all();
//        DB::table('categories')->insert([
//            'title' => $request->input('title'),
//            'description'=> $request->input('description'),
//            'created_at' => $request->input('created_at')
//        ]);

        return view('admin.categories.index')->with(['request'=>$request, 'categories'=> $categories]);
    }

}
