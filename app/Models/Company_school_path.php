<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_school_path extends Model
{
    protected $primaryKey = 'company_school_path_id';

    protected $fillable = [
        'company_id',
        'school_path_id',
    ];

    /**
     * Relation avec le modèle School_path
     */
    public function schoolPath() {
        return $this->belongsTo(School_path::class, 'school_path_id');
    }

    /**
     * Récupère toutes les lignes pour un company_id donné avec les labels des school_path associés
     */
    public static function getSchoolPathsForCompanyById($company_id) {
        return self::where('company_id', $company_id)->with('schoolPath:school_path_label')->get();
    }
}
