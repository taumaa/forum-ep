<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Company;
use App\Models\Internship_offer;
use App\Models\School_level_offer;
use App\Models\School_level;
use App\Models\School_path_offer;
use App\Models\School_path;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Renvoie sur la page listant toutes les offres de stage
     */
    public function getAllInternshipOffers() {
        $internship_offers = Internship_offer::getAllInternshipOffers();
        $all_levels = School_level::getAllSchoolLevels();
        $all_paths = School_path::getAllSchoolPaths();
        $all_months = [
            "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
            "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
        ];
        return view('offers', ['internship_offers' => $internship_offers, 
                                'all_levels' => $all_levels,
                                'all_paths'=> $all_paths,
                                'all_months' => $all_months]);
    }
}
