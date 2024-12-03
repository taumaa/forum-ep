<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Renvoie sur la page de FAQ
     */
    public function getAllFaq() {
        $faq = Faq::getAllFaq();
        return view('faq', ['faq' => $faq]);
    }

}
