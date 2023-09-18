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

        $news = DB::table('news')->get();



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

        $category = DB::table('categories')
            ->where('title', '=' , $request->input('category'))
            ->get();
        dump( $category->first()->id);

        DB::table('news')->insert([
            'title' => $request->input('title'),
            'category_id' => $category->first()->id,
            'author' => $request->input('author'),
            'status' => $request->input('status'),
            'description'=> $request->input('description'),
            'image' => fake()->imageUrl(200,150),
            'created_at' => $request->input('created_at')
        ]);

        $newsId = DB::table('news')->count();

//        if(Storage::disk()->exists('news.json')) {
//            $json = Storage::disk()->get('news.json');
//            $newNews = json_decode($json, true);
//            $news->setNews($newNews);
//        }

        return redirect()->route('admin.news.show',['news' => $newsId, 'request' => $request]);
    }

    public function show(Request $request, $newsId) {

        $news = DB::table('news')->find($newsId);
//        $newsJson = json_decode(Storage::disk()->get('news.json'), true);
//        $news->setNews($newsJson);
//        $oneNews = $news->getNews($newsId);

//        if ($oneNews == null) {
//            return redirect()->route('admin.news.index');
//        }

        return view('admin.news.show')->with(['oneNews' => $news, 'request' => $request]);
    }
}
