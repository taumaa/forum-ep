<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School_path extends Model
{
    protected $primaryKey = 'school_path_id';
    public $timestamps = false;

    protected $fillable = [
        'school_path_label',
    ];

    public function schoolPath()     {
        return $this->belongsTo(School_path::class, 'school_path_id');
    }

    /**
     * Lien avec la table des offres
     */
    public function internshipOffers() {
        return $this->belongsToMany(
            Internship_offer::class,
            'school_path_offers',
            'internship_offer_id',
            'school_path_id'
        );
    }

    /**
     * Récupère toutes les filières
     */
    public static function getAllSchoolPaths() {
        $school_paths = School_path::all()->sortBy('school_path_label');
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
