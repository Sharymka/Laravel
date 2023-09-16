<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    use CategoriesTrait;
    use NewsTrait;
    use Storage;

   public function getCategories():array {
       $this->categories = $this->createCategories();

       return $this->categories;
    }

    public function getBlockOfNews() {
        $this->news = $this->createNews();
        return $this->news;
    }

    public function getOneNews($categoryId, $newsId) {
        $blockOfNews =  $this->getBlockOfNews($categoryId);
            foreach ($blockOfNews as $oneNews) {
                if($oneNews['id'] == $newsId) {
                    return $oneNews;
                }
            }
        return null;
    }
}
