<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Forum_edition;
use App\Models\Forum_edition_company;
use Illuminate\Http\Request;
use DateTime;

class HomeController extends Controller
{
    /**
     * Renvoie sur la page d'accueil
     */
    public function getHomeInformations() {
        $home_informations = Setting::getAllSettings();
        $latest_forum = Forum_edition::getLatestForum();
        
        // Initialize companies as empty array by default
        $companies = [];
        $formatted_date = null;
        
        if ($latest_forum) {
            $companies = Forum_edition_company::getCompaniesForForumById($latest_forum->forum_id);
            
            $dateTime = new DateTime($latest_forum->date);
            setlocale(LC_TIME, 'fr_FR.UTF-8');
            $formatter = new \IntlDateFormatter('fr_FR', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
            $formatted_date = $formatter->format($dateTime);
        }
        
        return view('home', [
            'home_informations' => $home_informations, 
            'latest_forum' => $latest_forum,
            'companies' => $companies,
            'formatted_date' => $formatted_date
        ]);
    }
}
