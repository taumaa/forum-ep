<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Renvoie sur la page listant tous les CV
     */
    public function getAllCvs() {
        $visitors = Visitor::getAllVisitors();
        return view('cvs', ['visitors' => $visitors]);
    }
}
