<?php

namespace App\Http\Controllers;
use App\Models\Category;

trait CategoriesTrait
{


   public function createCategories(): array {

       $categories = [];
       $quantityCategoties = 5;
       $slug = [
           'sport',
           'politics',
           'weather',
           'economics',
           'others'
       ];

           for($i = 1; $i <= $quantityCategoties; $i++) {
               $categories[$i] = [
                   'id' => $i,
                   'title'=> \fake()->jobTitle(),
                   'author' => \fake()->userName(),
                   'slug' => $slug[$i-1],
                   'created_at' =>now()->format('d-m-y h:i'),
               ];
       }
           return $categories;
   }


}
