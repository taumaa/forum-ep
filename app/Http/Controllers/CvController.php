<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Renvoie sur la page listant tous les CV
     */
    public function getAllCvs() {
        $students = Student::getAllStudents();
        return view('cvs', ['students' => $students]);
    }
}
