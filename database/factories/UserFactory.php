<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // كلمة مرور افتراضية
            'remember_token' => Str::random(10),
            'is_admin' => $this->faker->boolean(20), // 20% أن يكون المستخدم Admin
            'username' => $this->faker->unique()->userName,
            'birthday' => $this->faker->dateTimeBetween('-50 years', '-18 years'),
            'profile_picture' => 'images/default-profile.png',
            'about_me' => $this->faker->sentence,
        ];
    }
}
