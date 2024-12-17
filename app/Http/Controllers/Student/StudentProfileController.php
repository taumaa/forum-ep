<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class StudentProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        if ($user->type !== 'student') {
            return redirect('/');
        }
        
        $student = Student::find($user->student_id);
        return view('student.profile', ['user' => $user, 'student' => $student]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user->type !== 'student') {
            return redirect('/');
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id() . ',user_id',
            'school_level_id' => 'nullable|exists:school_levels,school_level_id',
            'school_path_id' => 'nullable|exists:school_paths,school_path_id',
            'abroad' => 'required|boolean',
            'cv' => 'nullable|file|mimes:pdf|max:5120', // 5MB max
        ]);

        $student = Student::find($user->student_id);

        // Update student information
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->school_level_id = $request->school_level_id;
        $student->school_path_id = $request->school_path_id;
        $student->abroad = $request->abroad;

        // Handle CV upload if provided
        if ($request->hasFile('cv')) {
            // Delete old CV if exists
            if ($student->cv) {
                Storage::delete($student->cv);
            }

            // Store new CV
            $cvPath = $request->file('cv')->store('cvs', 'public');
            $student->cv = $cvPath;
        }

        $student->save();

        // Update user email if changed
        if ($user->email !== $request->email) {
            $user->email = $request->email;
            $user->save();
        }

        return redirect()->route('student.profile')->with('success', 'Profil mis à jour avec succès');
    }
}
