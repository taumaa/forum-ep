<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
class CompanyHomeController extends Controller
{
    public function index() {

        $user = Auth::user();
        return view('company.home', ['user' => $user]);
    }
}
