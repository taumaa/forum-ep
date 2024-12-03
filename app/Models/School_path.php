<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School_path extends Model
{
    protected $primaryKey = 'school_path_id';

    protected $fillable = [
        'school_path_label',
    ];

    /**
     * Récupère toutes les filières
     */
    public static function getAllSchoolPaths() {
        $school_paths = School_path::all();
        return $school_paths;
    }

    /**
     * Récupère une filière selon son id
     */
    public static function getSchoolPathById($id) {
        $school_path = School_path::find($id); 
        if (!$school_path) {
            return null;
        }
        return $school_path;
    }

    /**
     * Crée une nouvelle filière
     */
    public static function createSchoolPath($school_path_label) {
        $school_path = new School_path();

        $school_path->school_path_label = $school_path_label;

        $success = $school_path->save(); 
        return response()->json(['success' => $success, 'school_path' => $school_path]);
    }

    /**
     * Modifie une filière désignée par son id
     */
    public static function updateSchoolPathById($id, $school_path_label) {
        $school_path = self::find($id);

        if ($school_path) {
            $school_path->school_path_label = $school_path_label;

            $success = $school_path->save();
            return response()->json(['success' => $success, 'school_path' => $school_path]);
        }
    }

    /**
     * Supprime une filière désignée par son id
     */
    public static function deleteSchoolPathById($id) {
        $school_path = self::find($id);

        if ($school_path) {
            $success = $school_path->delete();
            return response()->json(['success' => $success, 'message' => 'School path deleted successfully']);
        }
    }
}
