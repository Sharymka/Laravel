<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    use NewsTrait;

    public function newsCategories(Category $categories)
    {

        $categories = DB::table('categories')->get();
        return view('news.categories', ['categories' => $categories]);
    }


    public function blockOfNews(Category $categories, News $news, string $categorySlug) {

        $category = DB::table('categories')
            ->where('title', '=', $categorySlug)->get();

        $blockOfNews = DB::table('news')->get()
            ->where('category_id', '=', $category->first()->id);
        return \view('news.news',
            ['blockOfNews' => $blockOfNews, 'categorySlug' => $categorySlug]);


    }

    public function showOne(News $news, $categorySlug, $newsId)
    {
        $oneNews = DB::table('news')->find($newsId);
//        dump($oneNews);
        return \view('news.oneNews',
            ['oneNews' => $oneNews, 'categorySlug' => $categorySlug]);

    }
        public function addNews(Request $request)
        {
            $title = $request->input('title');
            $description = $request->input('description');
            $category_id = $request->input('category_id');
            $news = $this->createOneNews($category_id, $title, $description);
            $this->setNews($news);
            $oneNews = $this->getNews();
            return view('oneNews', ['oneNews' => $oneNews, 'categoryId' => $category_id]);
        }
}
