<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AllCompaniesExport;
use App\Exports\AllStudentsExport;
use App\Models\Company;
use App\Models\School_level;
use App\Models\School_path;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Récupère la liste des entreprises dans un excel
     */
    public function getAllCompanies () {
        if (true) { // checker si on est connecté en tant qu'admin
            $companies = Company::getAllCompanies();
            $fileName = 'Liste_entreprises.xlsx';
            return Excel::download(new AllCompaniesExport($companies), $fileName);
        }
        return view('errors.404');
    }

    /**
     * Récupère la liste des étudiants dans un excel
     */
    public function getAllStudents () {
        if (true) { // checker si on est connecté en tant qu'admin
            $students = Student::getAllStudents();
            $fileName = 'Liste_etudiants.xlsx';
            return Excel::download(new AllStudentsExport($students), $fileName);
        }
        return view('errors.404');
    }
}
