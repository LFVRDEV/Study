<?php

namespace Database\Factories\Catalogs;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catalogs\Incident>
 */
class IncidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['M', 'U'];
        $unites = ['Q', 'M'];

        return [
            'name' => $this->faker->unique()->name(),
            'type' => array_rand($types),
            'unit' => array_rand($unites),
            'amount' => $this->faker->randomNumber()
        ];
    }
}
