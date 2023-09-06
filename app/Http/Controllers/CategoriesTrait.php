<?php

namespace App\Http\Controllers;

trait CategoriesTrait
{

   public function createCategories(): array {

       $categories = [];
       $quantityCategoties = 5;

           for($i = 1; $i <= $quantityCategoties; $i++) {
               $categories[$i] = [
                   'id' => $i,
                   'name'=> \fake()->jobTitle()
               ];
       }
           return $categories;
   }


}
