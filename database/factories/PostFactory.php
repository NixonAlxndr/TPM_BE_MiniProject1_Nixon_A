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
            "Title" => fake()->sentence(3),
            "AuthorName" => fake()->name,
            "Image" => fake()->imageUrl(640, 480,'book',true),
            "Description" => fake()->text,
            "CategoryId" => fake()->numberBetween(1,20)
        ];
    }
}
