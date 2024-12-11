<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Faq;
use App\Models\Forum_edition;
use App\Models\Forum_edition_company;
use App\Models\School_level;
use App\Models\School_path;
use App\Models\School_path_company;
use App\Models\Student;
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

        /*
        $logo = '/images/logo.png';
        $ico = '/images/favicon.ico';
        $description = 'Description de la plateforme';
        $image = '/images/home/home.png';
        $video = '/videos/home.mp4';
        $settings = Setting::createSetting($logo, $ico, $description, $image, $video);
        */

        // Create sample companies
        $company1 = Company::create([
            'name' => 'TechCorp Solutions',
            'logo' => '/images/companies/techcorp.png',
            'sector' => 'Software Development',
            'description' => 'Leading provider of enterprise software solutions',
            'website' => 'https://techcorp.example.com',
            'contact' => 'contact@techcorp.example.com'
        ]);

        $company2 = Company::create([
            'name' => 'Digital Innovations',
            'logo' => '/images/companies/digitalinnovations.png', 
            'sector' => 'Digital Services',
            'description' => 'Innovative digital transformation company',
            'website' => 'https://digitalinnovations.example.com',
            'contact' => 'info@digitalinnovations.example.com'
        ]);

        $company3 = Company::create([
            'name' => 'CyberGuard Systems',
            'logo' => '/images/companies/cyberguard.png',
            'sector' => 'Cybersecurity',
            'description' => 'Enterprise cybersecurity solutions provider',
            'website' => 'https://cyberguard.example.com',
            'contact' => 'security@cyberguard.example.com'
        ]);

        // Create sample FAQ items
        Faq::createFaq(
            'What is the purpose of this platform?',
            'This platform connects students with companies for internship opportunities and facilitates participation in career forums.'
        );

        Faq::createFaq(
            'How do I create an account?',
            'Click the "Sign Up" button and choose whether you are a student or company representative. Fill in the required information to create your account.'
        );

        Faq::createFaq(
            'How can companies post internship offers?',
            'Companies can post internship offers by logging into their account, navigating to the "Internships" section, and clicking "Post New Offer".'
        );

        Faq::createFaq(
            'What should I do if I forgot my password?',
            'Click on the "Forgot Password" link on the login page. Enter your email address and follow the instructions sent to reset your password.'
        );


    }
}
