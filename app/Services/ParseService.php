<?php

namespace App\Services;

use App\Http\Enums\news\Status;
use App\Models\Category;
use App\Models\News;
use App\Services\Interfaces\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParseService implements Parser
{
    public string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'description' => ['uses' => 'channel.description'],
            'link' => ['uses' => 'channel.link'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => "channel.item[title,link,description,author,pubDate,category,enclosure::url]"]

        ]);

        for ($i = 0; $i < count($data['news']); $i++) {
            $category = Category::query()->firstOrCreate([
//                'author' => fake()->name,
                'title' => $data['news'][$i]['category'],
//                'created_at' => now()->format('y-m-d'),
//                'updated_at' => null
            ]);

            News::query()->firstOrCreate([
                'category_id' => $category->id,
                'author' => $data['news'][$i]['author'],
                'title' => $data['news'][$i]['title'],
                'status' => Status::ACTIVE->value,
                'description' => $data['news'][$i]['description'],
                'image' => $data['news'][$i]['enclosure::url'] ?? $data['link'] . $data['image'],
//                'created_at' => DateTime::createFromFormat('D, d M Y H:i:s O', ($data['news'][$i]['pubDate'])),
//                'updated_at' => null
            ]);
        }
    }
}
