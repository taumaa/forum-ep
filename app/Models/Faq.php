<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $primaryKey = 'faq_id';
    public $timestamps = false;

    protected $fillable = [
        'question',
        'answer',
    ];

    /**
     * Récupère toutes les question / réponses de la FAQ
     */
    public static function getAllFaqs() {
        $faq = Faq::all();
        return $faq;
    }

    /**
     * Récupère une FAQ selon son id
     */
    public static function getFaqById($id) {
        $faq = Faq::find($id); 
        if (!$faq) {
            return null;
        }
        return $faq;
    }

    /**
     * Crée une nouvelle FAQ
     */
    public static function createFaq($question, $answer) {
        $faq = new Faq();

        $faq->question = $question;
        $faq->answer = $answer;

        $success = $faq->save(); 
        return response()->json(['success' => $success, 'faq' => $faq]);
    }

    /**
     * Modifie une FAQ désignée par son id
     */
    public static function updateFaqById($id, $question, $answer) {
        $faq = self::find($id);

        if ($faq) {
            $faq->question = $question;
            $faq->answer = $answer;

            $success = $faq->save();
            return response()->json(['success' => $success, 'faq' => $faq]);
        }
    }

    /**
     * Supprime une FAQ désignée par son id
     */
    public static function deleteFaqById($id) {
        $faq = self::find($id);

        if ($faq) {
            $success = $faq->delete();
            return response()->json(['success' => $success, 'message' => 'FAQ deleted successfully']);
        }
    }
}
