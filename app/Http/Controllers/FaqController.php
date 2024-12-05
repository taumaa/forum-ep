<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Renvoie sur la page de FAQ
     */
    public function getAllFaqs() {
        $faqs = Faq::getAllFaqs();
        return view('faq', ['faqs' => $faqs]);
    }

}
