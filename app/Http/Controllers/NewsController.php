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

        return view('news.categories', ['categories' => $categories]);
    }


    public function blockOfNews(int $categoryId) {

        $category = Category::query()
            ->find($categoryId);

        $blockOfNews = News::query()
            ->where('category_id', '=', $category->id)
            ->paginate(5);

        return \view('news.news',
            ['blockOfNews' => $blockOfNews, 'categoryId' => $category->id]);
    }

    public function showOne(News $news, $categoryId, $newsId)
    {
        $oneNews = News::find($newsId);

        return \view('news.oneNews',
            ['oneNews' => $oneNews, 'categoryId' => $categoryId]);

    }
}


