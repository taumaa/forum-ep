<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Renvoie sur la page de demande de devis
     */
    public function goToQuote() {
        if (true) // chercker si on est bien pas connecté en tant qu'étudiant
            $options = Option::getAllOptions();
            return view('quote', ['options' => $options]);
        return view('errors.404');
    }

    
}
