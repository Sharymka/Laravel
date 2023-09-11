<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function blockOfNews($categoryName) {

         $blockOfNews = parent::getBlockOfNews($categoryName);

        return \view('news',
            ['blockOfNews' => $blockOfNews, 'categoryName' => $categoryName]);


    }

    public function showOne($categoryName, $newsId)
    {

        $oneNews = parent::getOneNews($categoryName, $newsId);
        return \view('oneNews',
            ['oneNews' => $oneNews, 'categoryName' => $categoryName]);

    }

    public function addNews(Request $request) {
//        dump($request);
        if($request->isMethod('post')) {
            $request->flash();
            redirect()->route('admin.addNews');
        }
        dump($request->old(), $request);
        return view('admin.addNews');
    }
}
