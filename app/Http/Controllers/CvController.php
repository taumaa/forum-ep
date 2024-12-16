<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\School_level;
use App\Models\School_path;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Renvoie sur la page listant tous les CV
     */
    public function getAllCvs() {
        $students = Student::getAllStudents();
        $all_levels = School_level::getAllSchoolLevels();
        $all_paths = School_path::getAllSchoolPaths();
        return view('cvs', ['students' => $students, 
            'all_levels' => $all_levels,
            'all_paths'=> $all_paths]);
    }
}
