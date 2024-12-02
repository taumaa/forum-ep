<?php

namespace Database\Factories;

use App\Models\SchoolLevel;
use App\Models\SchoolPath;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'login' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'admin' => fake()->boolean(10), // 10% chance of being admin
            'school_level_id' => SchoolLevel::factory(),
            'school_path_id' => SchoolPath::factory(),
            'abroad' => fake()->boolean(20), // 20% chance of being abroad
            'cv' => '/cvs/' . fake()->file(extension: 'pdf'),
        ];
    }
} 