<?php

namespace App\Models;

class News
{
    private array $news =
    [
        1 => [
                'id' => 1,
                'category_id' => 1,
                'title'=> 'title1',
                'description' => 'description1',
                'author' => 'author1',
                'created_at' =>'21-07-23',
                'isPrivate' => 'true',
                'status' => 'active'
            ],
        2 => [
                'id' => 2,
                'category_id' => 4,
                'title'=> 'title2',
                'description' => 'description2',
                'author' => 'author2',
                'created_at' =>'09-04-20',
                'isPrivate' => 'true',
                'status' => 'draft'
            ],
        3 => [
                'id' => 3,
                'category_id' => 5,
                'title'=> 'title3',
                'description' => 'description3',
                'author' => 'author3',
                'created_at' =>'03-04-21',
                'isPrivate' => 'false',
                'status' => 'draft'
            ],
        4 => [
            'id' => 4,
            'category_id' => 2,
            'title'=> 'title4',
            'description' => 'description4',
            'author' => 'author4',
            'created_at' =>'03-04-21',
            'isPrivate' => 'false',
            'status' => 'draft'
        ],
        5 => [
            'id' => 5,
            'category_id' => 3,
            'title'=> 'title5',
            'description' => 'description5',
            'author' => 'author5',
            'created_at' =>'03-04-21',
            'isPrivate' => 'false',
            'status' => 'active'
        ],
        6 => [
            'id' => 6,
            'category_id' => 1,
            'title'=> 'title6',
            'description' => 'description6',
            'author' => 'author6',
            'created_at' =>'21-07-23',
            'isPrivate' => 'false',
            'status' => 'active'
        ],
        7 => [
            'id' => 7,
            'category_id' => 4,
            'title'=> 'title7',
            'description' => 'description7',
            'author' => 'author7',
            'created_at' =>'09-04-20',
            'isPrivate' => 'false',
            'status' => 'draft'
        ],
        8 => [
            'id' => 8,
            'category_id' => 5,
            'title'=> 'title8',
            'description' => 'description8',
            'author' => 'author8',
            'created_at' =>'03-04-21',
            'isPrivate' => 'false',
            'status' => 'draft'
        ],
        9 => [
            'id' => 9,
            'category_id' => 2,
            'title'=> 'title9',
            'description' => 'description9',
            'author' => 'author9',
            'created_at' =>'03-04-21',
            'isPrivate' => 'true',
            'status' => 'draft'
        ],
        10 => [
            'id' => 10,
            'category_id' => 3,
            'title'=> 'title10',
            'description' => 'description10',
            'author' => 'author10',
            'created_at' =>'03-04-21',
            'isPrivate' => 'false',
            'status' => 'active'
        ],
    ];

    /**
     * @return array
     */
    public function getNews(int|string $idOneNews = null): array | null
    {
        if ($idOneNews == null) {
            return $this->news;
        }

        foreach ($this->news as $oneNews) {
            if ($idOneNews == $oneNews['id']) {
                return $oneNews;
            }
        }

        return null;
    }

    public function getNewsByCategoryId(int $categoryId) {
        $news = [];
        if ($categoryId != null) {
            foreach ($this->news as $oneNews) {
                if ($categoryId == $oneNews['category_id']) {
                    $news[] = $oneNews;
                }
            }
        }

        return $news;


    }

    /**
     * @param array $news
     */
    public function setNews(array $news): void
    {
        $this->news = $news;
    }

    public function addNews(array $oneNews) {
        $this->news[] = $oneNews;
    }


}
