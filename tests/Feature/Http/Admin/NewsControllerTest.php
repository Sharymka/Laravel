<?php

namespace Http\Admin;

use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function test_the_admin_page_returns_a_successful_response(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    public function test_the_admin_news_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('admin.news'));
        dump($response);
        $response->assertSeeText('News');
        $response->assertStatus(200);
    }

    public function test_the_admin_news_create_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertSeeText('Please add news');
        $response->assertStatus(200);
    }

    public function test_the_admin_news_store_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('admin.news.store'));


        $response->assertStatus(302);
    }

    public function test_the_admin_news_show_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('admin.news.show'));


        $response->assertStatus(200);
    }
}
