<?php


namespace App\Http\Controllers;
trait Storage
{
    private array $news = [];
    private array $categories = [];

    /**
     * @return array
     */
    public function getNews(): array
    {
        return $this->news;
    }

    /**
     * @param array $news
     */
    public function setNews(array $news): void
    {
        $this->news = $news;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     */
    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

}
