<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Renvoie sur la page de demande de devis
     */
    public function goToQuote() {
        if (true) // chercker si on est bien pas connecté en tant qu'étudiant
            return view('quote');
        return view('errors.404');
    }
}
