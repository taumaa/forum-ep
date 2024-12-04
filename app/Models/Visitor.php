<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $primaryKey = 'visitor_id';
    public $timestamps = false;

    protected $fillable = [
        'last_name',
        'first_name',
        'login',
        'password',
        'admin',
        'school_level_id',
        'school_path_id',
        'abroad',
        'cv',
    ];

    /**
     * Récupère tous les visiteurs
     */
    public static function getAllVisitors() {
        $visitors = Visitor::all();
        return $visitors;
    }

    /**
     * Récupère un visiteur selon son id
     */
    public static function getVisitorById($id) {
        $visitor = Visitor::find($id); 
        if (!$visitor) {
            return null;
        }
        return $visitor;
    }

    /**
     * Récupère tous les visiteurs selon une filière
     */
    public static function getVisitorsBySchoolPathId($school_path_id) {
        return self::where('school_path_id', $school_path_id)->get();
    }

    /**
     * Crée un nouveau visiteur
     */
    public static function createVisitor($last_name, $first_name, $login, $password, $school_level_id, $school_path_id) {
        $visitor = new Visitor();

        $visitor->last_name = $last_name;
        $visitor->first_name = $first_name;
        $visitor->login = $login;
        $visitor->password = bcrypt($password);
        $visitor->school_level_id = $school_level_id;
        $visitor->school_path_id = $school_path_id;

        $success = $visitor->save();
        return response()->json(['success' => $success,]);
    }

    /**
     * Modifie un visiteur désigné par son id
     */
    public static function updateVisitorById($id, $last_name, $first_name, $school_level_id, $school_path_id, $abroad, $cv) {
        $visitor = self::find($id);

        if ($visitor) {
            $visitor->last_name = $last_name;
            $visitor->first_name = $first_name;
            $visitor->school_level_id = $school_level_id;
            $visitor->school_path_id = $school_path_id;
            $visitor->abroad = $abroad;
            $visitor->cv = $cv;

            $success = $visitor->save();
            return response()->json(['success' => $success, 'visitor' => $visitor]);
        }
    }

    /**
     * Supprime un visiteur désigné par son id
     */
    public static function deleteVisitorById($id) {
        $visitor = self::find($id);

        if ($visitor) {
            $success = $visitor->delete();
            return response()->json(['success' => $success, 'message' => 'Visitor deleted successfully']);
        }
    }

}
