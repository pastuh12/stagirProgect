<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            CommentsSeeder::class,
            RoleSeeder::class,
            CategoriesSeeder::class,
            GallerySeeder::class,
            NewsSeeder::class,
            CategoriesNewsSeeder::class,
        ]);
    }
}
