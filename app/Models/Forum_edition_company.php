<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum_edition_company extends Model
{
    protected $primaryKey = 'forum_edition_company_id';
    public $timestamps = false;
    protected $fillable = [
        'forum_id',
        'company_id',
    ];

    /**
     * Relation avec le modèle Company
     */
    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Récupère les entreprises pour un forum_id donné avec les noms et logos des entreprises associées
     */
    public static function getCompaniesForForumById($forum_id) {
        return self::where('forum_id', $forum_id)
            ->with('company:company_id,name,logo,sector') 
            ->get();
    }
}


