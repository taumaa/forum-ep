<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sector;
use App\Models\Company;
use App\Models\Setting;
use App\Models\Forum_edition;
use App\Models\Faq;
use App\Models\School_level;
use App\Models\School_path;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class AdminHomeController extends Controller
{
    /**
     * Renvoie sur la page d'administration du site
     */
    public function index() {

        $user = Auth::user();
        $editions = Forum_edition::getAllYears();
        return view('admin.home', 
            ['user' => $user,
            'editions' => $editions]);
    }

    /**************************************** Édition de forum ****************************************/

    /**
     * Créer une nouvelle édition de forum
     */
    public function createEdition(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.admin-edition');
        }

        if ($request->isMethod('post')) {
            $date = $request->input('date'); 
            $starting_hour = $request->input('start-time'); 
            $ending_hour = $request->input('end-time'); 
            $picture = '';
            $isCreated = Forum_edition::createForum($date, $picture, $starting_hour, $ending_hour);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Editer une édition de forum
     */
    public function editEdition(Request $request, $year) {
        if ($request->isMethod('get')) {
            $edition = Forum_edition::getForumByYear($year);
            return view('admin.admin-edition', ['edition' => $edition]);
        }

        if ($request->isMethod('post')) {
            $date = $request->input('date'); 
            $starting_hour = $request->input('start-time'); 
            $ending_hour = $request->input('end-time'); 
            $picture = '';
            $isCreated = Forum_edition::updateForumByYear($date, $picture, $starting_hour, $ending_hour);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Supprimer une édition de forum
     */
    public function deleteEdition($year) {
        Forum_edition::deleteForumByYear($year);
        return redirect()->route('admin.home');
    }
}
