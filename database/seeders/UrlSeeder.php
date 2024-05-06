<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrlSeeder extends Seeder
{
    protected array $urls = [
        "https://lenta.ru/rss",
        "https://news.rambler.ru/rss/tech/",
        "https://news.rambler.ru/rss/politics/",
        "https://news.rambler.ru/rss/community/",
        "https://news.rambler.ru/rss/world/",
        "https://news.rambler.ru/rss/moscow_city/",
        "https://news.rambler.ru/rss/incidents/",
        "https://news.rambler.ru/rss/starlife/",
        "https://news.rambler.ru/rss/army/",
        "https://news.rambler.ru/rss/games/",
        "https://news.rambler.ru/rss/articles/",
        "https://news.rambler.ru/rss/Omsk/"
    ];

    public function run()
    {
        foreach ($this->urls as $url) {
            DB::table('resources')->insert([
                'url' => $url,
                'created_at' => now()->format('y-m-d')
            ]);
        }
    }

}
