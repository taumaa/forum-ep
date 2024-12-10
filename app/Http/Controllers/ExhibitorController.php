<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Forum_edition;
use App\Models\Internship_offer;
use App\Models\School_path;
use Illuminate\Http\Request;

class ExhibitorController extends Controller
{
    /**
     * Renvoie sur la page listant toutes les entreprises
     */
    public function getAllCompanies() {
        $latest_forum = Forum_edition::getLatestForum();
        $exhibitors = Company::getAllCompaniesByYear($latest_forum->date);
        return view('exhibitors', ['exhibitors' => $exhibitors]);
    }
}
