<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mythtale>
 */
class MythtaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "Title" => fake()->cityPrefix(),
            "Summary" => fake()->text(),
            "Type" => fake()->word(),
            "CultureId" => random_int(1,22)
        ];
    }
}
