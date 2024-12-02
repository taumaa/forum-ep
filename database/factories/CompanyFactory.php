<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'logo' => '/logos/' . fake()->file(extension: 'jpg'),
            'sector' => fake()->randomElement(['Informatique', 'Électronique', 'Mécanique', 'Aérospatial', 'Énergie']),
            'description' => fake()->paragraphs(2, true),
            'website' => fake()->url(),
            'contact' => fake()->phoneNumber(),
        ];
    }
} 