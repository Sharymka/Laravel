<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController
{

    public function index(News $news, Request $request) {

        if(Storage::disk()->exists('news.json')) {
            $json = Storage::disk()->get('news.json');
            $newNews = json_decode($json, true);
            $news->setNews($newNews);
        }

        return view('admin.news.index', ['news' => $news->getNews(), 'request' => $request]);
    }

    public function store(Request $request, News $news, Category $categories) {

        if(Storage::disk()->exists('news.json')) {
            $json = Storage::disk()->get('news.json');
            $newNews = json_decode($json, true);
            $news->setNews($newNews);
        }

        $category = $categories->getCategories($request->input('category'));
        $id = count($news->getNews());
        $newsToAdd = [
            'id' =>++$id,
            'category_id' => $category['id'],
            'title'=> $request->input('title'),
            'description' => $request->input('description'),
            'author' => $request->input('author'),
            'created_at' =>$request->input('created_at'),
            'isPrivate' => 'false',
            'status' => $request->input('status')
        ];

        $news->addNews($newsToAdd);


        $json = json_encode($news->getNews(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//
        Storage::disk('local')->put('news.json', $json);

        return redirect()->route('admin.news.show',['news' => $id, 'request' => $request]);
    }

    public function create(Request $request) {

        return view('admin.news.create', ['request' => $request]);
    }

    public function show(Request $request, $newsId, News $news) {

        $newsJson = json_decode(Storage::disk()->get('news.json'), true);
        $news->setNews($newsJson);
        $oneNews = $news->getNews($newsId);

        if ($oneNews == null) {
            return redirect()->route('admin.news.index');
        }

        return view('admin.news.show')->with(['oneNews' => $oneNews, 'request' => $request]);
    }
}
