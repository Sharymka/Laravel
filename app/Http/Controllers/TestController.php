<?php

namespace App\Http\Controllers;
use  Illuminate\Http\Request;


class TestController
{
    use NewsTrait;
    public function test(Request $request) {
//        dump($request->all());
//        $title = $request->input('title');
//        $description = $request->input('description');
//        $category_id = $request->input('category_id');
//        $news = $this->createOneNews($category_id, $title, $description);
//         $this->setNews($news);
//        $oneNews = $this->getNews();
//        dump($oneNews);
//        return view('oneNews', ['oneNews' => $oneNews, 'categoryId'=> $category_id]);
    }
}
