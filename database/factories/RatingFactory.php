<?php
namespace Database\Factories;

use App\Models\Rating;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'recipe_id' => Recipe::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}

