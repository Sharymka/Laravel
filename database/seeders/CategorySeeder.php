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

        $categories = [];
        $quantityCategoties = 10;

        for($i = 1; $i <= $quantityCategoties; $i++) {
            $categories[$i] = [
                'id' => $i,
                'title'=> \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'created_at' =>now()->format('d-m-y h:i'),
            ];
        }
        return $categories;

    }
}
