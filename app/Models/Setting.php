<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'setting_id';
    public $timestamps = false;

    protected $fillable = [
        'logo',
        'logo_footer',
        'ico',
        'description',
        'image',
        'video',
        'building',
        'contact',
    ];

    /**
     * Récupère toutes les informations de la page d'accueil
     */
    public static function getAllSettings() {
        return Setting::first();
    }

    /**
     * Modifie les informations de la page d'accueil
     */
    public static function updateSettingById($id, $logo, $logo_footer, $ico, $description, $image, $video, $building, $contact) {
        $setting = self::find($id);
    
        if ($setting) {
            $setting->logo = $logo;
            $setting->logo_footer = $logo_footer;
            $setting->ico = $ico;
            $setting->description = $description;
            $setting->image = $image;
            $setting->video = $video;
            $setting->building = $building;
            $setting->contact = $contact;
    
            $success = $setting->save();
            return response()->json(['success' => $success, 'setting' => $setting]);
        }
    }
}
