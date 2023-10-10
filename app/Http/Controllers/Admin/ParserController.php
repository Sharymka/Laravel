<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Enums\news\Status;
use App\Models\Category;
use App\Models\News;
use DateTime;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function __invoke(Request $request)
    {
        $url = "https://lenta.ru/rss";
        $url2 = "https://news.rambler.ru/rss/tech/";

        $urls = [
            $url,
            $url2
        ];
        foreach ($urls as $url) {
            $xml = XmlParser::load($url);
            $data = $xml->parse([
                'title' => ['uses' => 'channel.title'],
                'description' => ['uses' => 'channel.description'],
                'link' => ['uses' => 'channel.link'],
                'image' => ['uses' => 'channel.image.url'],
                'news' => ['uses' => "channel.item[title,link,description,author,pubDate,category,enclosure::url]"]

            ]);

            $this->addToDataBaseCategories($data);
            $this->addToDataBaseNews($data);
        }

        return redirect()->route('admin.news.index');
    }

    private function addToDataBaseCategories($data)
    {
        $category = new Category();

        for ($i = 0; $i < count($data['news']); $i++) {
            $category->query()->insertOrIgnore([
                'author' => fake()->name,
                'title' => $data['news'][$i]['category'],
                'created_at' => now()->format('y-m-d'),
                'updated_at' => null
            ]);
        }
    }

    private function addToDataBaseNews($data)
    {
        $news = new News();

        for ($i = 0; $i < count($data['news']); $i++) {
            $category = Category::query()->where('title', '=', $data['news'][$i]['category'])->first();

            $news->query()->insertOrIgnore([
                'category_id' => $category->id,
                'author' => $data['news'][$i]['author'],
                'title' => $data['news'][$i]['category'],
                'status' => Status::getEnums()[fake()->numberBetween(0, 2)],
                'description' => $data['news'][$i]['description'],
                'image' => $data['news'][$i]['enclosure::url'] ?? $data['link'] . $data['image'],
                'created_at' => DateTime::createFromFormat('D, d M Y H:i:s O', ($data['news'][$i]['pubDate'])),
                'updated_at' => null
            ]);
        }
    }

}
