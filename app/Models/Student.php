<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'student_id';
    public $timestamps = false;

    protected $fillable = [
        'last_name',
        'first_name',
        'school_level_id',
        'school_path_id',
        'abroad',
        'cv',
    ];

    /**
     * Lien avec la table Users
     */
    public function user() {
        return $this->belongsTo(User::class, 'student_id', 'student_id');
    }

    /**
     * Lien avec la table School_levels
     */
    public function schoolLevel() {
        return $this->belongsTo(School_level::class, 'school_level_id', 'school_level_id');
    }

    /**
     * Lien avec la table School_paths
     */
    public function schoolPath() {
        return $this->belongsTo(School_path::class, 'school_path_id', 'school_path_id');
    }

    /**
     * Récupère tous les visiteurs
     */
    public static function getAllStudents() {
        $students = Student::select('student_id', 'first_name', 'last_name', 'abroad', 'cv', 'student_id', 'school_level_id', 'school_path_id') 
            ->with([
                'user:user_id,student_id,email', 
                'schoolLevel:school_level_id,school_level_label', 
                'schoolPath:school_path_id,school_path_label' 
            ])
            ->get();
        
        return $students;
    }    

    /**
     * Récupère un visiteur selon son id
     */
    public static function getStudentById($id) {
        $student = Student::find($id); 
        if (!$student) {
            return null;
        }
        return $student;
    }

    /**
     * Récupère tous les visiteurs selon une filière
     */
    public static function getStudentsBySchoolPathId($school_path_id) {
        return self::where('school_path_id', $school_path_id)->get();
    }

    /**
     * Crée un nouveau visiteur
     */
    public static function createStudent($last_name, $first_name, $login, $password, $school_level_id, $school_path_id) {
        $student = new Student();

        $student->last_name = $last_name;
        $student->first_name = $first_name;
        $student->login = $login;
        $student->password = bcrypt($password);
        $student->school_level_id = $school_level_id;
        $student->school_path_id = $school_path_id;

        $success = $student->save();
        return response()->json(['success' => $success,]);
    }

    /**
     * Modifie un visiteur désigné par son id
     */
    public static function updateStudentById($id, $last_name, $first_name, $school_level_id, $school_path_id, $abroad, $cv) {
        $student = self::find($id);

        if ($student) {
            $student->last_name = $last_name;
            $student->first_name = $first_name;
            $student->school_level_id = $school_level_id;
            $student->school_path_id = $school_path_id;
            $student->abroad = $abroad;
            $student->cv = $cv;

            $success = $student->save();
            return response()->json(['success' => $success, 'student' => $student]);
        }
    }

    /**
     * Supprime un visiteur désigné par son id
     */
    public static function deleteStudentById($id) {
        $student = self::find($id);

        if ($student) {
            $success = $student->delete();
            return response()->json(['success' => $success, 'message' => 'Student deleted successfully']);
        }
    }

}
