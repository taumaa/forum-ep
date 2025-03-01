<?php

namespace App\Http\Controllers;

use App\Models\Forum_edition;

class HeadController extends Controller
{
    public function index() {
        $setting = Forum_edition::getAllSettings(); // Passe le favicon du site
        return view('components.head', [
            'setting' => $setting
        ]);
    }
}
