<?php

namespace App\Models;

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
        'contact',
    ];

    /**
     * Lien avec la table des offres de stage
     */
    public function internshipOffers() {
        return $this->hasMany(Internship_offer::class, 'company_id', 'company_id');
    }

    /**
     * Récupère toutes les entreprises
     */
    public static function getAllCompanies() {
        $companies = Company::with(['internshipOffers.schoolPaths'])->get();

        return $companies->map(function ($company) {
            return (object) [
                'company_id' => $company->company_id,
                'name' => $company->name,
                'logo' => $company->logo,
                'sector' => $company->sector,
                'description' => $company->description,
                'website' => $company->website,
                'contact' => $company->contact,
                'school_paths' => $company->internshipOffers
                    ->flatMap(function ($offer) {
                        return $offer->schoolPaths->pluck('school_path_label');
                    })
                    ->unique()->values()->all(),
            ];
        });
    }

    /**
     * Récupère une entreprise par son ID
     */
    public static function getCompanyById($companyId) {
        $company = Company::with(['internshipOffers.schoolPaths', 'internshipOffers.schoolLevels'])
            ->findOrFail($companyId);
    
        return (object) [
            'company_id' => $company->company_id,
            'name' => $company->name,
            'logo' => $company->logo,
            'sector' => $company->sector,
            'description' => $company->description,
            'website' => $company->website,
            'contact' => $company->contact,
            'school_paths' => $company->internshipOffers
                ->flatMap(function ($offer) {
                    return $offer->schoolPaths->pluck('school_path_label');
                })
                ->unique()->values()->all(),
            'offers' => $company->internshipOffers->map(function ($offer) {
                return (object) [
                    'internship_offer_id' => $offer->internship_offer_id,
                    'title' => $offer->title,
                    'offer_description' => $offer->offer_description,
                    'company_id' => $offer->company_id,
                    'location' => $offer->location,
                    'date' => $offer->date,
                    'school_levels' => $offer->schoolLevels->map(function ($schoolLevel) {
                        return (object) [
                            'school_level_id' => $schoolLevel->school_level_id,
                            'school_level_label' => $schoolLevel->school_level_label,
                        ];
                    }),
                    'school_paths' => $offer->schoolPaths->map(function ($schoolPath) {
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
    public static function getCompaniesBySector($sector) {
        return self::where('sector', $sector)->get();
    }

    /**
     * Crée une nouvelle entreprise
     */
    public static function createCompany($name, $logo, $sector, $description, $website, $contact) {
        $company = new Company();

        $company->name = $name;
        $company->logo = $logo;
        $company->sector = $sector;
        $company->description = $description;
        $company->website = $website;
        $company->contact = $contact;

        $success = $company->save(); 

        return response()->json(['success' => $success,]);
    }

    /**
     * Modifie une entreprise désignée par son id
     */
    public static function updateCompanyById($id, $name, $logo, $sector, $description, $website, $contact) {
        $company = self::find($id);

        if ($company) {
            $company->name = $name;
            $company->logo = $logo;
            $company->sector = $sector;
            $company->description = $description;
            $company->website = $website;
            $company->contact = $contact;

            $success = $company->save();
            return response()->json(['success' => $success, 'company' => $company]);
        }
    }

    /**
     * Supprime une entreprise désignée par son id
     */
    public static function deleteCompanyById($id, $name, $logo, $sector, $description, $website, $contact) {
        $company = self::find($id);

        if ($company) {
            $success = $company->delete();
            return response()->json(['success' => $success, 'message' => 'Company deleted successfully']);
        }
    }

}
