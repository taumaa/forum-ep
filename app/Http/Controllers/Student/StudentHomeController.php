<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
class StudentHomeController extends Controller
{
    public function index() {

        $user = Auth::user();
        $student = Student::find($user->student_id);

        return view('student.home', ['user' => $user, 'student' => $student]);
    }
}
