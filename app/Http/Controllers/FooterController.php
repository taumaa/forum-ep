<?php

namespace App\Http\Controllers;

use App\Models\Forum_edition;

class FooterController extends Controller
{
    public function index() {
        $setting = Forum_edition::getAllSettings(); // Passe le logo de l'ESIEE
        return view('components.header', [
            'setting' => $setting
        ]);
    }
}
