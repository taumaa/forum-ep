<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $primaryKey = 'option_id';

    protected $fillable = [
        'option_label',
    ];

    /**
     * Récupère toutes les options des stands
     */
    public static function getAllOptions() {
        $options = Option::all();
        return $options;
    }

    /**
     * Récupère une option selon son id
     */
    public static function getOptionById($id) {
        $option = Option::find($id); 
        if (!$option) {
            return null;
        }
        return $option;
    }

    /**
     * Crée une nouvelle option
     */
    public static function createOption($option_label) {
        $option = new Option();

        $option->option_label = $option_label;

        $success = $option->save(); 
        return response()->json(['success' => $success, 'option' => $option]);
    }

    /**
     * Modifie une option désignée par son id
     */
    public static function updateOptionById($id, $option_label) {
        $option = self::find($id);

        if ($option) {
            $option->option_label = $option_label;

            $success = $option->save();
            return response()->json(['success' => $success, 'option' => $option]);
        }
    }

    /**
     * Supprime une option désignée par son id
     */
    public static function deleteOptionById($id) {
        $option = self::find($id);

        if ($option) {
            $success = $option->delete();
            return response()->json(['success' => $success, 'message' => 'Option deleted successfully']);
        }
    }
}
