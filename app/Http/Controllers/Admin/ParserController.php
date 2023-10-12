<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
    {
        $urls = [
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
        foreach ($urls as $url) {
            $parser->setLink($url)->saveParseData();
        }

        return redirect()->route('admin.news.index');
    }

}
