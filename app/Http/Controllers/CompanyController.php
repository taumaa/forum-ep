<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
