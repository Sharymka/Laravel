<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public array $categories;
    public array $news;
    use AuthorizesRequests, ValidatesRequests;
    use CategoriesTrait;
    use NewsTrait;

   public function getCategories():array {
       $this->categories = $this->createCategories();

       return $this->categories;
    }

    private function generateNews() {
        foreach ($this->categories as $key => $blockOfNews) {
            $this->news[$blockOfNews['name']] = $this->createNews();
        }
    }

    public function getBlockOfNews($categoryName) {
        $news = $this->createNews();
//        foreach ($news as $name => $blockOfNews) {
//            if($name == $categoryName) {
//                return $blockOfNews;
//            }
//        }
        return $news;
    }

    public function getOneNews($categoryName, $newsId) {
        $blockOfNews =  $this->getBlockOfNews($categoryName);
            foreach ($blockOfNews as $oneNews) {
                if($oneNews['id'] == $newsId) {
                    return $oneNews;
                }
            }
        return null;
    }
}
