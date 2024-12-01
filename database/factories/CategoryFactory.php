<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genres = [
            'Science Fiction', 
            'Fantasy', 
            'Mystery', 
            'Romance', 
            'Thriller', 
            'Non-fiction', 
            'Historical Fiction', 
            'Horror', 
            'Biography', 
            'Self-help'
        ]; 

        return [
            "CategoryName" => fake()->randomElement($genres),
        ];
    }
}
