<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'company_id';

    protected $fillable = [
        'name',
        'logo',
        'sector',
        'description',
        'website',
        'contact',
    ];

    /**
     * Récupère toutes les entreprises
     */
    public static function getAllCompanies() {
        $companies = Company::all();
        return $companies;
    }

    /**
     * Récupère une entreprise selon son id
     */
    public static function getCompanyById($id) {
        $company = Company::find($id); 
        if (!$company) {
            return null;
        }
        return $company;
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
