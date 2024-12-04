<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
