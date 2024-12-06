<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'company_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'logo',
        'sector',
        'description',
        'website',
        'email',
        'phone',
    ];

    /**
     * Lien avec la table des offres de stage
     */
    public function internshipOffers() {
        return $this->hasMany(Internship_offer::class, 'company_id', 'company_id');
    }

    /**
     * Lien avec la table des éditions de forum
     */
    public function forumEditions() {
        return $this->belongsToMany(Forum_edition::class, 'forum_edition_companies', 'company_id', 'forum_id');
    }

    /**
     * Lien avec la table des secteurs d'activité
     */
    public function sector() {
        return $this->belongsTo(Sector::class, 'sector_id', 'sector_id');
    }


    /**
     * Récupère toutes les entreprises
     */
    public static function getAllCompanies() {
        $companies = Company::with(['internshipOffers.schoolPaths', 'sector'])->get();

        return $companies->map(function ($company) {
            return (object) [
                'company_id' => $company->company_id,
                'name' => $company->name,
                'logo' => $company->logo,
                'sector' => $company->sector->sector_label,
                'description' => $company->description,
                'location' => $company->location,
                'website' => $company->website,
                'email' => $company->email,
                'phone' => $company->phone,
                'school_paths' => $company->internshipOffers
                    ->flatMap(function ($offer) {
                        return $offer->schoolPaths->pluck('school_path_label');
                    })
                    ->unique()->values()->all(),
            ];
        });
    }

    /**
     * Récupère toutes les entreprises par édition
     */
    public static function getAllCompaniesByForumEdition($forum_id) {
        $companies = Company::with(['internshipOffers.schoolPaths', 'sector'])
        ->whereHas('forumEditions', function ($query) use ($forum_id) {
            $query->where('forum_edition_companies.forum_id', $forum_id);
        })
        ->get();
    
        // Transformer les résultats pour inclure les school_paths uniques
        return $companies->map(function ($company) {
            return (object) [
                'company_id' => $company->company_id,
                'name' => $company->name,
                'logo' => $company->logo,
                'sector' => $company->sector->sector_label,
                'description' => $company->description,
                'location' => $company->location,
                'website' => $company->website,
                'email' => $company->email,
                'phone' => $company->phone,
                'school_paths' => $company->internshipOffers
                    ->flatMap(function ($offer) {
                        return $offer->schoolPaths->pluck('school_path_label');
                    })
                    ->unique()->sort()->values()->all(),
            ];
        });
    }    

    /**
     * Récupère une entreprise par son ID
     */
    public static function getCompanyById($companyId) {
        $company = Company::with(['internshipOffers.schoolPaths', 'internshipOffers.schoolLevels', 'sector'])
            ->findOrFail($companyId);
    
        return (object) [
            'company_id' => $company->company_id,
            'name' => $company->name,
            'logo' => $company->logo,
            'sector' => $company->sector->sector_label,
            'description' => $company->description,
            'location' => $company->location,
            'website' => $company->website,
            'email' => $company->email,
            'phone' => $company->phone,
            'school_paths' => $company->internshipOffers
                ->flatMap(function ($offer) {
                    return $offer->schoolPaths->pluck('school_path_label');
                })
                ->unique()->sort()->values()->all(),
            'offers' => $company->internshipOffers->map(function ($offer) {
                return (object) [
                    'internship_offer_id' => $offer->internship_offer_id,
                    'title' => $offer->title,
                    'offer_description' => $offer->offer_description,
                    'company_id' => $offer->company_id,
                    'location' => $offer->location,
                    'date' => $offer->date,
                    'min_duration' => $offer->min_duration,
                    'max_duration' => $offer->max_duration,
                    'school_levels' => $offer->schoolLevels->sortBy('school_level_label')->map(function ($schoolLevel) {
                        return (object) [
                            'school_level_id' => $schoolLevel->school_level_id,
                            'school_level_label' => $schoolLevel->school_level_label,
                        ];
                    }),
                    'school_paths' => $offer->schoolPaths->sortBy('school_path_label')->map(function ($schoolPath) {
                        return (object) [
                            'school_path_id' => $schoolPath->school_path_id,
                            'school_path_label' => $schoolPath->school_path_label,
                        ];
                    }),
                ];
            }),
        ];
    }

    /**
     * Récupère toutes les entreprises selon le nom
     */
    public static function getCompaniesByName($name) {
        return self::where('name', $name)->get();
    }

    /**
     * Récupère toutes les entreprises selon un secteur d'activité
     */
    public static function getCompaniesBySector($sector_id) {
        return self::where('sector_id', $sector_id)->get();
    }

    /**
     * Crée une nouvelle entreprise
     */
    public static function createCompany($name, $logo, $sector_id, $description, $location, $website, $email, $phone) {
        $company = new Company();

        $company->name = $name;
        $company->logo = $logo;
        $company->sector_id = $sector_id;
        $company->description = $description;
        $company->location = $location;
        $company->website = $website;
        $company->email = $email;
        $company->phone = $phone;

        $success = $company->save(); 

        return response()->json(['success' => $success,]);
    }

    /**
     * Modifie une entreprise désignée par son id
     */
    public static function updateCompanyById($id, $name, $logo, $sector_id, $description, $location, $website, $email, $phone) {
        $company = self::find($id);

        if ($company) {
            $company->name = $name;
            $company->logo = $logo;
            $company->sector_id = $sector_id;
            $company->description = $description;
            $company->location = $location;
            $company->website = $website;
            $company->email = $email;
            $company->phone = $phone;

            $success = $company->save();
            return response()->json(['success' => $success, 'company' => $company]);
        }
    }

    /**
     * Supprime une entreprise désignée par son id
     */
    public static function deleteCompanyById($company_id) {
        $company = self::find($company_id);

        if ($company) {
            $success = $company->delete();
            return response()->json(['success' => $success, 'message' => 'Company deleted successfully']);
        }
    }

}
