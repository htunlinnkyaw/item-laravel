<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "price" => fake()->numberBetween(100, 1000),
            "stock" => fake()->numberBetween(10, 50),
            "description" => fake()->word(),
            "status" => "available",
            "category_id" => fake()->numberBetween(1, 3),
        ];
    }
}
