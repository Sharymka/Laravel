<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoriesTrait;
use App\Http\Controllers\NewsTrait;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController
{
    use CategoriesTrait;
    use NewsTrait;

    public function index() {
        $news = $this->createNews();
//        dump($news);
        return view('admin.news.index', ['news' =>$news]);
    }

    public function store(Request $request, News $news) {
        dump($news->getNews());
        $id = count($news->getNews());
        $news->addNews([
            'id' =>$id,
            'category_id' => 6,
            'title'=> $request->input('title'),
            'description' => $request->input('description'),
            'author' => $request->input('author'),
            'created_at' =>$request->input('created_at'),
            'isPrivate' => 'false',
            'status' => $request->input('status')
        ]);
        dump($news->getNews());

        $oneNews = $news->getNews($id);

//        return view('admin.news.show')->with(['oneNews' => $oneNews]);
        return redirect()->route('admin.news.show',['oneNews' => $oneNews]);
//        return redirect()->route('admin.news.create');
    }

    public function update() {

    }

    public function create(News $news) {

        return view('admin.news.create',['news' => $news]);
    }

    public function show($oneNews) {
        dump($oneNews);
//        return view('admin.news.show')->with(['oneNews' => $oneNews]);
    }
}
