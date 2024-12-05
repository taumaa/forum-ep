<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'setting_id';
    public $timestamps = false;

    protected $fillable = [
        'logo',
        'ico',
        'description',
        'image',
        'video',
    ];

    /**
     * Récupère toutes les informations de la page d'accueil
     */
    public static function getAllSettings() {
        $setting = Setting::first();
        return $setting;
    }

    /**
     * Modifie les informations de la page d'accueil
     */
    public static function updateSettingById($id, $logo, $ico, $description, $image, $video) {
        $setting = self::find($id);
    
        if ($setting) {
            $setting->logo = $logo;
            $setting->ico = $ico;
            $setting->description = $description;
            $setting->image = $image;
            $setting->video = $video;
    
            $success = $setting->save();
            return response()->json(['success' => $success, 'setting' => $setting]);
        }
    }

    /**
     * Crée les informations de la page d'accueil
     */
    public static function createSetting($logo, $ico, $description, $image, $video) {
        $setting = new Setting();

        $setting->logo = $logo;
        $setting->ico = $ico;
        $setting->description = $description;
        $setting->image = $image;
        $setting->video = $video;
        $success = $setting->save();
    }
}
