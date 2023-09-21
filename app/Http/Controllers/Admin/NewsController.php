<?php

namespace App\Http\Controllers\Admin;

use App\Http\Enums\news\Status;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController
{

    public function index(Request $request) {

        $news =  News::query()
                ->status()
                ->orderByDesc('id')
                ->paginate(10);
//                ->with('category');
//                ->get();
//        $news = DB::table('news')->get();



        return view('admin.news.index', ['news' => $news, 'request' => $request]);
    }

    public function create(Request $request) {

        $statuses = Status::getEnums();
        $categories = Category::all();
//        $categories = DB::table('categories')->get();

        return view('admin.news.create')
            ->with([
                'request' => $request,
                'statuses' => $statuses,
                'categories' => $categories]);
    }

    public function store(Request $request) {
//        dump($request->file('image'));
        $request->flash();
        dump($request);

        $data = $request->only(['category_id','title', 'author', 'created_at', 'description', 'status']);

        if($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        } else {
            $path = null;
        }

        $data['image'] = $path;

        $news = new News($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');

    }

    public function show(Request $request, $newsId) {

//        $oneNews = DB::table('news')->find($newsId);
        $oneNews = News::find($newsId);

        return view('admin.news.show')->with(['oneNews' => $oneNews, 'request' => $request, 'path' => $oneNews->image]);

    }

    public function edit(Request $request, $newsId) {

        $categories = Category::all();
        $oneNews = News::find($newsId);
//        $newsOne = DB::table('news')->find($newsId);
        return view('admin.news.edit')
            ->with([
                'oneNews' => $oneNews,
                'categories' => $categories,
                'request' => $request
            ]);

    }

    public function update(Request $request, News $news) {

//        $request->flash();
//        $newsOne = News::find($newsId);
//        $categories = Category::all();
//
//
//        return view('admin.news.edit')
//            ->with([
//                'oneNews' => $newsOne,
//                'categories' => $categories,
//                'request' => $request
//            ]);
        $data = $request->only(['category_id', 'title', 'author', 'created_at', 'description', 'status']);

        if($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        } else {
            $path = null;
        }

        $data['image'] = $path;
        $news->fill($data);
        dump($news);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');

    }
}
