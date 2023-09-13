<?php

namespace App\Models;

class Category
{
    private array $categories;

    /**
     * @param array $categories
     */
    public function __construct(array $categories)
    {
        $this->categories = $categories;
    }


    /**
     * @param array $categories
     */
    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
}
