<?php

namespace App\Http\Controllers;

use App\Models\Forum_edition;

class HeaderController extends Controller
{
    public function index() {
        $years = Forum_edition::getAllYears(); // Passe les années des éditions précédentes à la vue
        $setting = Forum_edition::getAllSettings(); // Passe le logo de l'ESIEE
        return view('components.header', [
            'years' => $years,
            'setting' => $setting
        ]);
    }
}
