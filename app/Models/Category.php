<?php

namespace App\Models;

class Category
{
    private array $categories = [
        1 => [
            'id' => 1 ,
            'title'=> 'sport',
            'author' => 'author1',
            'slug' => 'sport' ,
            'created_at' =>'21-09-19',
        ],
        2 => [
            'id' => 2 ,
            'title'=> 'economics',
            'author' => 'author2',
            'slug' => 'economics' ,
            'created_at' =>'12-04-20',
        ],
        3 => [
            'id' => 3 ,
            'title'=> 'politics',
            'author' => 'author3',
            'slug' => 'politics' ,
            'created_at' =>'18-03-21',
        ],
        4 => [
            'id' => 4,
            'title'=> 'weather',
            'author' => 'author4',
            'slug' => 'weather' ,
            'created_at' =>'16-14-22',
        ],
        5 => [
            'id' => 5,
            'title'=> 'city live',
            'author' => 'author5',
            'slug' => 'city live' ,
            'created_at' =>'16-17-21',
        ],
    ];

    /**
     * @param array $categories
     */
    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @param array $categories
     */
    public function addCategories(array $category): void
    {
        $this->categories[] = $category;
    }

    /**
     * @return array
     */
    public function getCategories(string $categorySlug = null): array|null
    {
        if($categorySlug == null) {
            return $this->categories;
        }

        foreach ($this->categories as $category) {
            if ($categorySlug == $category['slug']) {
                return $category;
            }
        }
        return null;

    }
}
