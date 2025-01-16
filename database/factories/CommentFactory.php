<?php
namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph,
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'recipe_id' => Recipe::inRandomOrder()->first()->id ?? Recipe::factory(),
        ];
    }
}
