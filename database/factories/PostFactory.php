<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'creator' => fake()->name(),
            'votes_enable' => fake()->boolean(50),
            'votes_name1' => fake()->randomElement(['Да', 'Нет']),
            'votes_name2' =>fake()->randomElement(['Да', 'Нет']),
            'votes_value1' => fake()->numberBetween(0, 50),
            'votes_value2' => fake()->numberBetween(0, 50),
            'likes_count' => fake()->numberBetween(0, 50),
            'comments_count' => fake()->numberBetween(0, 50),
        ];
    }
}
