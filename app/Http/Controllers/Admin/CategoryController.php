<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoriesTrait;
use App\Http\Controllers\Controller;
use App\Http\Enums\news\Status;
use App\Http\Requests\Admin\Categories\Create;
use App\Http\Requests\Admin\Categories\Edit;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class CategoryController extends Controller
{
    public function index(Request $request) {

        $categories = Category::query()
            ->orderByDesc('id')
            ->paginate(3);

        return view('admin.categories.index')->with(['categories'=> $categories, 'request'=>$request]);
    }

    public function create(Request $request) {

        return view('admin.categories.create')->with(['request'=>$request]);
    }

    public function store(Create $request) {

        $request->flash();

        $data = $request->only(['title', 'author', 'description', 'created_at']);

        $categories =  new Category($data);

        if($categories->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    public function edit(Request $request, $categoryId) {

        $category = Category::query()
            ->find($categoryId);
        return view('admin.categories.edit')->with(['request' =>$request, 'category'=> $category]);
    }

    public function update(Edit $request, Category $category) {

        $data = $request->only(['title', 'author', 'description', 'updated_at']);

        $category->fill($data);

        if($category->save()) {
            return redirect()->route('admin.categories.index', ['categories'=> $category ])->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось изменить запись');

    }

}
