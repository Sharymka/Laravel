<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getCategories());
    }

    private function getCategories() {

        return [
            1=>['id' => 1,
                'title'=> 'Sport',
                'author' => 'Petrov Alex',
                'description' => \fake()->text(100),
                'created_at' =>now()->format('d-m-y h:i')
                ],
            2=>['id' => 2,
                'title'=> 'Weather',
                'author' => 'Sonina Maria',
                'description' => \fake()->text(100),
                'created_at' =>now()->format('d-m-y h:i')
            ],
            3=>['id' => 3,
                'title'=> 'Politics',
                'author' => 'Krakov Victor',
                'description' => \fake()->text(100),
                'created_at' =>now()->format('d-m-y h:i')
            ],
            4=>['id' => 4,
                'title'=> 'Economics',
                'author' => 'Petuhov Stanislav',
                'description' => \fake()->text(100),
                'created_at' =>now()->format('d-m-y h:i')
            ],
            5=>['id' => 5,
                'title'=> 'Others',
                'author' => 'Milova Anastasiya',
                'description' => \fake()->text(100),
                'created_at' =>now()->format('d-m-y h:i')
            ],
        ];



    }
}
