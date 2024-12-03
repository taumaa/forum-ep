<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Renvoie sur la page d'accueil
     */
    public function getHomeInformations() {
        $home_informations = Setting::getAllSettings();
        return view('home', ['home_informations' => $home_informations]);
    }
}
