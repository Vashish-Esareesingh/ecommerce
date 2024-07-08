<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['white', 'black', 'silver', 'gold'];

        return [
            'title' => Str::ucfirst(fake()->unique()->words(6, true)),
            'short_description' => fake()->text(200),
            'full_description' => fake()->text(500),
            'price' => fake()->numberBetween(300, 500),
            'quantity' => 50,
            'image_path' => '/images/products/',
            'image_name' => 'iphone1-'.fake()->numberBetween(1, 4).'.jpg',
            'category' => $categories[fake()->numberBetween(0, sizeof($categories) - 1)],
            'classification' => 'default',
            'created_at' => fake()->dateTimeBetween(now()->subMonths(3), now()),
        ];
    }
}
