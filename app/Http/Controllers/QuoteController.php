<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Option;
use App\Exports\QuoteFormExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Récupère les informations de la demande de devis pour y écrire dans un excel
     */
    public function goToQuoteValidation(Request $request)
    {
        if (true) { // chercker si on est bien pas connecté en tant qu'étudiant
            // Récupérer les données du formulaire
            $formData = $request->all();
            
            // Nom du fichier Excel
            $fileName = 'Demande_devis_' . $formData['Nom_entreprise'] . '.xlsx';

            // Utiliser Laravel Excel pour exporter les données
            Excel::store(new QuoteFormExport($formData), 'quotes/' . $fileName, 'public'); 

            // Retourne la vue indiquant que l'opération est réussie
            return view('quote-validation');
        } 
        return view('errors.404');
    }

}
