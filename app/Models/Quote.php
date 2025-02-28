<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $primaryKey = 'quote_id';
    public $timestamps = false;

    protected $fillable = [
        'quote_name',
        'is_validated',
    ];

    /**
     * Récupère toutes les demandes de devis non validées
     */
    public static function getUnvalidatedQuotes() {
        $all_quotes = Quote::where('is_validated', false)->get();
        return $all_quotes;
    }

    /**
     * Valide une demande de devis désignée par son id
     */
    public static function validateQuoteById($id) {
        $quote = self::find($id);

        if ($quote) {
            $quote->is_validated = true;
            $success = $quote->save();
            return response()->json(['success' => $success, 'quote' => $quote]);
        }
    }

    /**
     * Supprime une demande devis désignée par son id
     */
    public static function deleteQuoteById($id) {
        $quote = self::find($id);

        if ($quote) {
            $success = $quote->delete();
            return response()->json(['success' => $success, 'message' => 'Quote deleted successfully']);
        }
    }
}
