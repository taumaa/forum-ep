<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship_offer extends Model
{
    protected $primaryKey = 'internship_offer_id';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'offer_description',
        'company_id',
    ];

    /**
     * Lien avec la table des filières
     */
    public function schoolPaths() {
        return $this->belongsToMany(
            School_path::class,
            'school_path_offers', // Nom de la table pivot
            'internship_offer_id', // Clé étrangère dans la table pivot
            'school_path_id' // Clé étrangère dans la table cible
        );
    }

    /**
     * Lien avec la table des niveaux
     */
    public function schoolLevels() {
        return $this->belongsToMany(
            School_level::class,
            'school_level_offers', // Nom de la table pivot
            'internship_offer_id', // Clé étrangère dans la table pivot
            'school_level_id' // Clé étrangère dans la table cible
        );
    }

    /**
     * Récupère toutes les offres de stage
     */
    public static function getAllInternshipOffers() {
        return self::all();
    }

    /**
     * Récupère une offre de stage selon son id
     */
    public static function getInternshipOfferById($id) {
        $offer = self::find($id); 
        if (!$offer) {
            return null;
        }
        return $offer;
    }

    /**
     * Récupère toutes les offres de stage d'une entreprise donnée
     */
    public static function getInternshipOffersByCompanyId($company_id) {
        $offers = self::where('company_id', $company_id)->get();
        return $offers;
    }

    /**
     * Récupère toutes les offres de stage concernant une filière donnée
     */
    public static function getInternshipOffersBySchoolPathId($school_path_id) {
        $offers = self::where('school_path_id', $school_path_id)->get();
        return $offers;
    }

    /**
     * Crée une nouvelle offre de stage
     */
    public static function createInternshipOffer($title, $offer_description, $company_id) {
        $offer = new self();

        $offer->title = $title;
        $offer->offer_description = $offer_description;
        $offer->company_id = $company_id;

        $success = $offer->save(); 
        return response()->json(['success' => $success, 'offer' => $offer]);
    }

    /**
     * Modifie une offre de stage désignée par son id
     */
    public static function updateInternshipOfferById($id, $title, $offer_description, $company_id) {
        $offer = self::find($id);

        if ($offer) {
            $offer->title = $title;
            $offer->offer_description = $offer_description;
            $offer->company_id = $company_id;

            $success = $offer->save();
            return response()->json(['success' => $success, 'offer' => $offer]);
        }
    }

    /**
     * Supprime une offre de stage désignée par son id
     */
    public static function deleteInternshipOfferById($id) {
        $offer = self::find($id);

        if ($offer) {
            $success = $offer->delete();
            return response()->json(['success' => $success, 'message' => 'Internship offer deleted successfully']);
        }
    }
}
