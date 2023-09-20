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

        $news = News::query()->paginate(10);
//        $news = DB::table('news')->get();



        return view('admin.news.index', ['news' => $news, 'request' => $request]);
    }

    public function create(Request $request) {

        $statuses = Status::getEnums();
        $categories = DB::table('categories')->get();

        return view('admin.news.create')
            ->with([
                'request' => $request,
                'statuses' => $statuses,
                'categories' => $categories]);
    }

    public function store(Request $request) {
//        dump($request->file('image'));
        $request->flash();

        if($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        } else {
            $path = null;
        }

        $category = DB::table('categories')
            ->where('title', '=' , $request->input('category'))
            ->get();
        dump( $category->first()->id);

        $newsId = DB::table('news')->insertGetId([
            'title' => $request->input('title'),
            'category_id' => $category->first()->id,
            'author' => $request->input('author'),
            'status' => $request->input('status'),
            'description'=> $request->input('description'),
            'image' => $path,
            'created_at' => $request->input('created_at')
        ]);

//        $newsId = DB::table('news')->count();

        $statuses = Status::getEnums();
        $categories = DB::table('categories')->get();

//        return view('admin.news.create')
//            ->with([
//                'request' => $request,
//                'statuses' => $statuses,
//                'categories' => $categories]);
        return redirect()->route('admin.news.show',['news' => $newsId] );
    }

    public function show(Request $request, $news) {

        $newsOne = DB::table('news')->find($news);
        return view('admin.news.show')->with(['oneNews' => $newsOne, 'request' => $request, 'path' => $newsOne->image]);

    }
}
