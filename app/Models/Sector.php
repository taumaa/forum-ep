<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $primaryKey = 'sector_id';
    public $timestamps = false;

    protected $fillable = [
        'sector_label',
    ];

    /**
     * Récupère tous les secteurs d'activité
     */
    public static function getAllSectors() {
        $all_sectors = Sector::all()->sortBy('sector_label');
        return $all_sectors;
    }

    /**
     * Récupère un secteur d'activité depuis son id
     */
    public static function getSectorById($id) {
        $sector = Sector::find($id); 
        if (!$sector) {
            return null;
        }
        return $sector;
    }

    /**
     * Crée un nouveau secteur d'activité
     */
    public static function createSector($sector_label) {
        $sector = new Sector();

        $sector->sector_label = $sector_label;

        $success = $sector->save(); 
        return response()->json(['success' => $success, 'sector' => $sector]);
    }

    /**
     * Modifie un secteur d'activité désigné par son id
     */
    public static function updateSectorById($id, $sector_label) {
        $sector = self::find($id);

        if ($sector) {
            $sector->sector_label = $sector_label;

            $success = $sector->save();
            return response()->json(['success' => $success, 'sector' => $sector]);
        }
    }

    /**
     * Supprime un secteur d'activité désigné par son id
     */
    public static function deleteSectorById($id) {
        $sector = self::find($id);

        if ($sector) {
            $success = $sector->delete();
            return response()->json(['success' => $success, 'message' => 'Sector deleted successfully']);
        }
    }
}
