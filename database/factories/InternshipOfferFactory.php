<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\SchoolPath;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InternshipOffer>
 */
class InternshipOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Stage ' . fake()->jobTitle(),
            'offer_description' => fake()->paragraphs(3, true),
            'company_id' => Company::factory(),
            'school_path_id' => SchoolPath::factory(),
        ];
    }
} 