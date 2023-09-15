<?php

namespace App\Http\Controllers;
use App\Models\Category;

trait CategoriesTrait
{


   public function createCategories(): array {

       $categories = [];
       $quantityCategoties = 5;

           for($i = 1; $i <= $quantityCategoties; $i++) {
               $categories[$i] = [
                   'id' => $i,
                   'title'=> \fake()->jobTitle(),
                   'author' => \fake()->userName(),
                   'created_at' =>now()->format('d-m-y h:i'),
               ];
       }
           return $categories;
   }


}
