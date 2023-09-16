<?php

namespace Http\news;

use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function test_the_news_categories_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('news.categories'));

        $response->assertStatus(200);
        $response->assertSeeText('Categories');
    }

    public function test_the_news_blockOfNews_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('news.blockOfNews', ['categoryId' => 1]));

        $response->assertStatus(200);
        $response->assertSeeText('News');
    }

    public function test_the_news_showOne_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('news.showOne', ['categoryId' => 1, 'newsId' => 2 ]));

        $response->assertStatus(200);
        $response->assertSeeText('Show one news');
    }
}
