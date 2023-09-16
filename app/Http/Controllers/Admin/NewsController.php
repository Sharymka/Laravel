<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoriesTrait;
use App\Http\Controllers\NewsTrait;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController
{
//    use CategoriesTrait;
//    use NewsTrait;

    public function index(News $news) {

        if(file_exists('/tmp/news.json')) {
            $json = file_get_contents('/tmp/news.json');
            $newNews = json_decode($json, true);
            $news->setNews($newNews);
        }

        return view('admin.news.index', ['news' => $news->getNews()]);
    }

    public function store(Request $request, News $news, Category $categories) {

        if(file_exists('/tmp/news.json')) {
            $json = file_get_contents('/tmp/news.json');
            $newNews = json_decode($json, true);
            dump($newNews);
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


        $json = json_encode($news->getNews(), JSON_PRETTY_PRINT);
//
        file_put_contents('/tmp/news.json',$json);

        return redirect()->route('admin.news.show',['news' => $id]);
    }

    public function create() {

        return view('admin.news.create');
    }

    public function show($newsId, News $news) {
        $json = file_get_contents('/tmp/news.json');
        $newsJson = json_decode($json, true);
        $news->setNews($newsJson);
        $oneNews = $news->getNews($newsId);

        if ($oneNews == null) {
            return redirect()->route('admin.news.index');
        }

        return view('admin.news.show')->with(['oneNews' => $oneNews]);
    }
}
