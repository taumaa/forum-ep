<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Internship_offer;
use App\Models\School_level_offer;
use App\Models\School_level;
use App\Models\School_path_offer;
use App\Models\School_path;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Renvoie sur la page de détail d'une entreprise
     */
    public function getCompanyById($id) {
        $company = Company::getCompanyById($id);
        if ($company) 
            return view('company', ['company' => $company]);
        return view('errors.404');
    }
}
