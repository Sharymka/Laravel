<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function blockOfNews($categoryId) {


         $blockOfNews = parent::getBlockOfNews();
//        dump($blockOfNews);
        return \view('news.news',
            ['blockOfNews' => $blockOfNews, 'categoryId' => $categoryId]);


    }

    public function showOne($categoryId, $newsId)
    {

        $oneNews = parent::getOneNews($categoryId, $newsId);
        return \view('news.oneNews',
            ['oneNews' => $oneNews, 'categoryId' => $categoryId]);

    }
        public function addNews(Request $request)
        {
//            dump($request->all());
            $title = $request->input('title');
            $description = $request->input('description');
            $category_id = $request->input('category_id');
            $news = $this->createOneNews($category_id, $title, $description);
            $this->setNews($news);
            $oneNews = $this->getNews();
//            dump($oneNews);
            return view('oneNews', ['oneNews' => $oneNews, 'categoryId' => $category_id]);
        }
}
