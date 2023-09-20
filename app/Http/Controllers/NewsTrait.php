<?php

namespace App\Http\Controllers;

trait NewsTrait
{
   public function createNews(int $idOneNews = null): array {

       $news = [];
       $quantityNews = 10;

       if($idOneNews == null) {
           for($i = 1; $i <= $quantityNews; $i++) {
               $news[$i] = [
                   'id' => $i,
                   'name'=> \fake()->jobTitle(),
                   'description' => \fake()->text(100),
                   'author' => \fake()->userName(),
                   'created_at' =>now()->format('d-m-y h:i'),
                   'isPrivate' => fake()->boolean()
               ];
           }
           return $news;
       }

       return [
           'id' => $idOneNews,
           'name'=> \fake()->jobTitle(),
           'description' => \fake()->text(100),
           'author' => \fake()->userName(),
           'created_at' => now()->format('d-m-y h:i'),
           'isPrivate' => fake()->boolean()
       ];
   }

//   public function getBlockOfNews(int $categoryId) {
//       $this->getBlockOfNews();
//   }
}
