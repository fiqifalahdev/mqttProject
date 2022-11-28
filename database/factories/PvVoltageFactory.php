<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PvVoltage>
 */
class PvVoltageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'topic' => 'PfSains/pvVolt',
            'message' => fake()->randomFloat(2, 1, 100),
            'type' => 'pvVolt'
        ];
    }
}
