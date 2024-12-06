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
            ->with(['company' => function ($query) {
                $query->with('sector') // Charger la relation `sector` pour obtenir sector_label
                      ->select('company_id', 'name', 'logo', 'sector_id'); // Inclure sector_id pour la relation
            }])
            ->get()
            ->sortBy(function ($forumCompany) {
                return $forumCompany->company->name; // Trier par name de company
            })
            ->map(function ($forumCompany) {
                return (object) [
                    'company_id' => $forumCompany->company->company_id,
                    'name' => $forumCompany->company->name,
                    'logo' => $forumCompany->company->logo,
                    'sector' => $forumCompany->company->sector ? $forumCompany->company->sector->sector_label : null, // Utilise sector_label
                ];
            });
    }
    
}


