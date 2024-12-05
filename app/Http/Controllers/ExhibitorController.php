<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Internship_offer;
use App\Models\School_path;
use Illuminate\Http\Request;

class ExhibitorController extends Controller
{
    /**
     * Renvoie sur la page listant toutes les entreprises
     */
    public function getAllCompanies() {
        $exhibitors = Company::getAllCompanies();
        return view('exhibitors', ['exhibitors' => $exhibitors]);
    }
}
