<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function newsCategories(Category $categories)
    {
        return view('news.categories', ['categories' => $categories->getCategories()]);
    }
    public function blockOfNews(Category $categories, News $news, string $categorySlug) {

        $category = $categories->getCategories($categorySlug);
        $blockOfNews = $news->getNewsByCategoryId($category['id']);

        return \view('news.news',
            ['blockOfNews' => $blockOfNews, 'categorySlug' => $categorySlug]);


    }

    public function showOne(News $news, $categorySlug, $newsId)
    {
        return \view('news.oneNews',
            ['oneNews' => $news->getNews($newsId), 'categorySlug' => $categorySlug]);

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
