<?php

namespace Database\Seeders;

use App\Http\Enums\news\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->insert($this->getNews());
    }

    private function getNews() {

        $categories = [];
        $quantityCategoties = 20;

        for($i = 1; $i <= $quantityCategoties; $i++) {
            $categories[$i] = [
                'id' => $i,
                'category_id' => fake()->numberBetween(1, 10),
                'title'=> \fake()->jobTitle(),
                'author' => \fake()->userName(),
                'status' => Status::getEnums()[fake()->numberBetween(0,2)],
                'description' => \fake()->text(100),
                'image' => fake()->imageUrl(200,150),
                'created_at' =>now()->format('d-m-y h:i'),
            ];
        }
        return $categories;

    }
}
