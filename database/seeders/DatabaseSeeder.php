<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\ForumEdition;
use App\Models\ForumEditionCompany;
use App\Models\SchoolLevel;
use App\Models\SchoolPath;
use App\Models\SchoolPathCompany;
use App\Models\Visitor;
use App\Models\InternshipOffer;
use App\Models\SchoolLevelOffer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create base school levels and paths
        $schoolLevels = SchoolLevel::factory(3)->create();
        $schoolPaths = SchoolPath::factory(4)->create();

        // Create companies
        $companies = Company::factory(5)->create();

        // Create forum editions
        $forumEditions = ForumEdition::factory(2)->create();

        // Link companies to forum editions
        foreach ($companies as $company) {
            foreach ($forumEditions as $forum) {
                ForumEditionCompany::create([
                    'forum_id' => $forum->forum_id,
                    'company_id' => $company->company_id
                ]);
            }
        }

        // Link companies to school paths (each company linked to 2 random paths)
        foreach ($companies as $company) {
            $randomPaths = $schoolPaths->random(2);
            foreach ($randomPaths as $path) {
                SchoolPathCompany::create([
                    'company_id' => $company->company_id,
                    'school_path_id' => $path->school_path_id
                ]);
            }
        }

        // Create internship offers
        $offers = InternshipOffer::factory(10)->create();

        // Link school levels to internship offers
        foreach ($offers as $offer) {
            // Each offer is available for 1-2 school levels
            $randomLevels = $schoolLevels->random(rand(1, 2));
            foreach ($randomLevels as $level) {
                SchoolLevelOffer::create([
                    'internship_offer_id' => $offer->internship_offer_id,
                    'school_level_id' => $level->school_level_id
                ]);
            }
        }

        // Create visitors (including one admin)
        Visitor::factory()->create([
            'last_name' => 'Admin',
            'first_name' => 'Super',
            'login' => 'admin@epf.fr',
            'password' => bcrypt('admin123'),
            'admin' => true,
            'school_level_id' => $schoolLevels->first()->school_level_id,
            'school_path_id' => $schoolPaths->first()->school_path_id,
            'abroad' => false,
            'cv' => '/cvs/admin.pdf'
        ]);

        // Create regular visitors
        Visitor::factory(20)->create();
    }
}
