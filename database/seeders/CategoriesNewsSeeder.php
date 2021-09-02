<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 60; $i++) {
            DB::table('categories_news')->insert([
                'news_id' => random_int(1, 50),
                'category_id' => random_int(1, 8),
            ]);
        }
    }
}
