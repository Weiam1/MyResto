<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        UserSeeder::class,
        CategorySeeder::class,
        RecipeSeeder::class,
        CommentSeeder::class,
        NewsSeeder::class,
        FaqCategorySeeder::class,
        FaqSeeder::class,
        RatingSeeder::class,
      
    ]);
}

}