<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Forum_edition;
use App\Models\Forum_edition_company;
use App\Models\School_level;
use App\Models\School_path;
use App\Models\School_path_company;
use App\Models\Visitor;
use App\Models\Internship_offer;
use App\Models\School_level_offer;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create base school levels and paths
        $labels = ['3ème année', '4ème année', '5ème année'];
        foreach ($labels as $label) {
            School_level::createSchoolLevel($label);
        }

        $paths = ['Développement web', 'Développement mobile', 'Design', 'Cybersécurité'];
        foreach ($paths as $path) {
            School_path::createSchoolPath($path);
        }

        // Create forum editions
        $date = '2024-01-01';
        $picture = '/images/forum/2024.png';
        $starting_hour = '10:00';
        $ending_hour = '12:00';
        $forumEditions = Forum_edition::createForum($date, $picture, $starting_hour, $ending_hour);

        $logo = '/images/logo.png';
        $ico = '/images/favicon.ico';
        $description = 'Description de la plateforme';
        $image = '/images/home/home.png';
        $video = '/videos/home.mp4';
        $settings = Setting::createSetting($logo, $ico, $description, $image, $video);

    }
}
