<?php

namespace App\Http\Controllers;

trait NewsTrait
{
   public function getNews(int $id = null): array {

       $news = [];
       $quantityNews = 10;

       if($id == null) {
           for($i = 1; $i <= $quantityNews; $i++) {
               $news[$i] = [
                   'id' => $i,
                   'name'=> \fake()->jobTitle(),
                   'description' => \fake()->text(100),
                   'author' => \fake()->userName(),
                   'created_at' =>now()->format('d-m-y h:i')
               ];
           }
           return $news;
       }

       return [
           'id' => $id,
           'name'=> \fake()->jobTitle(),
           'description' => \fake()->text(100),
           'author' => \fake()->userName(),
           'created_at' => now()->format('d-m-y h:i')
       ];
   }
}
