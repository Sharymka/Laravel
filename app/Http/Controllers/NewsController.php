<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    use NewsTrait;

    public function newsCategories()
    {
        $categories = Category::query()->paginate(6);

        dump($categories);
//        $categories = DB::table('categories')->get();
        return view('news.categories', ['categories' => $categories]);
    }


    public function blockOfNews(int $categoryId) {

        $category = Category::query()->find($categoryId);
//        $category = DB::table('categories')->find($id);
//        dump($category->id);

        $blockOfNews = News::query()->where('category_id', '=', $category->id)->get();
        dump($blockOfNews);
//        $blockOfNews = DB::table('news')->get()
//            ->where('category_id', '=', $category->first()->id);
        return \view('news.news',
            ['blockOfNews' => $blockOfNews, 'categoryId' => $category->id]);
    }

    public function showOne(News $news, $categoryId, $newsId)
    {
        $oneNews = News::find($newsId);
//        $oneNews = DB::table('news')->find($newsId);
//        dump($oneNews->title);
        return \view('news.oneNews',
            ['oneNews' => $oneNews, 'categoryId' => $categoryId]);

    }
}


