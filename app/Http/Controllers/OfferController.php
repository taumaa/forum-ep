<?php

namespace App\Http\Controllers;

use App\Models\Internship_offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Renvoie sur la page listant toutes les offres de stage
     */
    public function getAllInternshipOffers() {
        $internship_offers = Internship_offer::getAllInternshipOffers();
        return view('offers', ['internship_offers' => $internship_offers]);
    }
}