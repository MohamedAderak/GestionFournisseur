<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product' => fake()->name(),
            'desc' => fake(),
            'price' => 564,
            'service' => 'service001',
            'date' => now(),
            'Quantity' => 4614,
        ];
    }
}
