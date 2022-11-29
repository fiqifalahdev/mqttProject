<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WindCurrent>
 */
class WindCurrentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'topic' => 'PfSains/windCurrent',
            'message' => fake()->randomFloat(2, 1, 100),
            'type' => 'windCurrent'
        ];
    }
}
