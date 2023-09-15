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
                'category_id' => 6,
                'title'=> 'title3',
                'description' => 'description3',
                'author' => 'author3',
                'created_at' =>'03-04-21',
                'isPrivate' => 'false',
                'status' => 'draft'
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
