<?php

namespace App\Http\Controllers;

trait NewsTrait
{
    use Storage;

   public function createNews(int $idOneNews = null): array {

       $news = [];
       $quantityNews = 10;

       if($idOneNews == null) {
           for($i = 1; $i <= $quantityNews; $i++) {
               $news[$i] = [
                   'id' => $i,
                   'category_id' => $i,
                   'title'=> \fake()->jobTitle(),
                   'description' => \fake()->text(100),
                   'author' => \fake()->userName(),
                   'created_at' =>now()->format('d-m-y h:i'),
                   'isPrivate' => fake()->boolean(),
                   'status' => 'active'
               ];
           }
           $this->setNews($news);

           return $this->getNews();
       }

       return [
           'id' => $idOneNews,
           'title'=> \fake()->jobTitle(),
           'description' => \fake()->text(100),
           'author' => \fake()->userName(),
           'created_at' => now()->format('d-m-y h:i'),
           'isPrivate' => fake()->boolean()
       ];
   }

public function createOneNews($categoryId, $title, $description) {

    if($title != null && $description != null) {
        return [
            'id' => count($this->getNews()),
            'title' => $title,
            'category_id' => $categoryId,
            'description' => $description,
            'author' => \fake()->userName(),
            'created_at' => now()->format('d-m-y h:i'),
            'isPrivate' => fake()->boolean()
        ];
    }
    return null;
}
}
