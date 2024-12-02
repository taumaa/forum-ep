<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolPath>
 */
class SchoolPathFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_path_label' => fake()->randomElement(['Informatique', 'Électronique', 'Mécanique', 'Généraliste']),
        ];
    }
} 