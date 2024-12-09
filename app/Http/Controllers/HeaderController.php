<?php

namespace App\Http\Controllers;

use App\Models\Forum_edition;

class HeaderController extends Controller
{
    public function index() {
        $years = Forum_edition::getAllYears();
        return view('components.header', compact('years')); // Passe les années à la vue
    }
}
