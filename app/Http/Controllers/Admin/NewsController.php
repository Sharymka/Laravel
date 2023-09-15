<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoriesTrait;
use App\Http\Controllers\NewsTrait;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController
{
    use CategoriesTrait;
    use NewsTrait;

    public function index() {

        $news = $this->getNews();

        if (count($news) == 0) {
            $news = $this->createNews();
        }

        return view('admin.news.index', ['news' => $news]);
    }

    public function store(Request $request, Response $response, News $news) {
        $id = count($news->getNews());
        $news->addNews([
            'id' =>++$id,
            'category_id' => 6,
            'title'=> $request->input('title'),
            'description' => $request->input('description'),
            'author' => $request->input('author'),
            'created_at' =>$request->input('created_at'),
            'isPrivate' => 'false',
            'status' => $request->input('status')
        ]);


        $json = json_encode($news->getNews(), JSON_PRETTY_PRINT);
//
        file_put_contents('/tmp/news.json',$json);

        return redirect()->route('admin.news.show',['news' => $id]);
    }

    public function update() {

    }

    public function create(News $news) {

        return view('admin.news.create')->with(['news' => $news]);
    }

    public function show($newsId, News $news) {
        $newsJson = json_decode(file_get_contents('/tmp/news.json'), true);
        $news->setNews($newsJson);
        $oneNews = $news->getNews($newsId);

        if ($oneNews == null) {
            return redirect()->route('admin.news.index');
        }

        return view('admin.news.show')->with(['oneNews' => $news->getNews($newsId)]);
    }
}
