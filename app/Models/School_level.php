<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School_level extends Model
{
    protected $primaryKey = 'school_level_id';
    public $timestamps = false;

    protected $fillable = [
        'school_level_label',
    ];

    /**
     * Lien avec la table des offres
     */
    public function internshipOffers()
    {
        return $this->belongsToMany(
            Internship_offer::class,
            'school_level_offers',
            'school_level_id',
            'internship_offer_id'
        );
    }

    /**
     * Récupère tous les niveaux scolaires
     */
    public static function getAllSchoolLevels() {
        $school_levels = School_level::all()->sortBy('school_level_label');
        return $school_levels;
    }

    /**
     * Récupère un niveau scolaire selon son id
     */
    public static function getSchoolLevelById($id) {
        $school_level = School_level::find($id); 
        if (!$school_level) {
            return null;
        }
        return $school_level;
    }

    /**
     * Crée un nouveau niveau scolaire
     */
    public static function createSchoolLevel($school_level_label) {
        $school_level = new School_level();

        $school_level->school_level_label = $school_level_label;

        $success = $school_level->save(); 
        return response()->json(['success' => $success, 'school_level' => $school_level]);
    }

    /**
     * Modifie un niveau scolaire désigné par son id
     */
    public static function updateSchoolLevelById($id, $school_level_label) {
        $school_level = self::find($id);

        if ($school_level) {
            $school_level->school_level_label = $school_level_label;

            $success = $school_level->save();
            return response()->json(['success' => $success, 'school_level' => $school_level]);
        }
    }

    /**
     * Supprime un niveau scolaire désigné par son id
     */
    public static function deleteSchoolLevelById($id) {
        $school_level = self::find($id);

        if ($school_level) {
            $success = $school_level->delete();
            return response()->json(['success' => $success, 'message' => 'School level deleted successfully']);
        }
    }
}
