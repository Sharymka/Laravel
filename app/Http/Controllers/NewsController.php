<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;
//    private array $news = [
//        [
//            'id' => 1,
//            'title' => 'Привет из космоса',
//            'inform' => 'Нам до луны как до луны'
//        ],
//        [
//            'id' => 2,
//            'title' => 'Опять дождь',
//            'inform' => 'Мокрые лужи на асфальте'
//        ],
//        [
//            'id' => 3,
//            'title' => 'Электричка',
//            'inform' => 'Опять от меня сбежала последняя электричка'
//        ]
//    ];

    public function index() {
        $news = $this->getNews();
        dump($news);

        return \view('news.index',
        ['news' => $news]);
    }

    public function showOne($id) {

        $news = $this->getNews();

        $NameRoute = route('showOne', $id);
        dump($NameRoute);


            return \view('news.show',
                ['news' => $news[$id]]);


//        if(!empty($news)) {
//            return <<<php
//        <h1>{$news['title']}</h1>
//        <div>{$news['inform']}</div>
//        <a href = "{$NameRoute}">Назад</a>
//        php;
//        }
//        return redirect("{$NameRoute}");
    }

//    private function getNewsById($id) {
//        foreach ($this->news as $news) {
//            if($news['id'] == $id) {
//                return $news;
//            }
//        }
//        return [];
//    }

    public function newsAdd() {
        return<<<php
        <form action="action.php" method="post">

            <p>
                <b><label for="name">News name:</label></b>
                <input name="name" id="name" type="text">
            </p>
            <p>
                <b><label for="briefDesc">Brief description:</label></b>
                <input name="briefDesc" id="briefDesc" type="text">
            </p>
            <p>
                <p><b>Full description:</b></p>
                <textarea rows="10" cols="45" name="fullDesc"></textarea>
            </p>
            <button style="margin: 0; padding: 10px 30px 10px 30px;" type="submit">add</button>
        </form>
php;

    }
}
