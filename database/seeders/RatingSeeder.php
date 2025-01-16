<?php

namespace Database\Seeders;

use App\Models\Rating;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    public function run(): void
    {
       
        $users = User::all();
        $recipes = Recipe::all();

        
        if ($users->isEmpty() || $recipes->isEmpty()) {
            $this->command->info('No users or recipes found. Please seed users and recipes first.');
            return;
        }

        
        foreach ($recipes as $recipe) {

            $numberOfRatings = rand(1, 10);

            for ($i = 0; $i < $numberOfRatings; $i++) {
                Rating::create([
                    'user_id' => $users->random()->id,
                    'recipe_id' => $recipe->id,
                    'rating' => rand(1, 5),
                ]);
            }
        }

        $this->command->info('Ratings seeded successfully.');
    }
}
