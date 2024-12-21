<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sector;
use App\Models\Company;
use App\Models\Setting;
use App\Models\Forum_edition;
use App\Models\Faq;
use App\Models\Option;
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
        $school_paths = School_path::getAllSchoolPaths();
        $school_levels = School_level::getAllSchoolLevels();
        $sectors = Sector::getAllSectors();
        $options = Option::getAllOptions();
        $faqs = Faq::getAllFaqs();
        return view('admin.home', 
            ['user' => $user,
            'editions' => $editions,
            'school_paths' => $school_paths,
            'school_levels' => $school_levels,
            'sectors' => $sectors,
            'options' => $options,
            'faqs' => $faqs]);
    }

    /**************************************** Éditions de forum ****************************************/

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

    /**************************************** Filières ****************************************/

    /**
     * Créer une nouvelle filière
     */
    public function createSchoolPath(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.admin-school_path');
        }

        if ($request->isMethod('post')) {
            $label = $request->input('label'); 
            $isCreated = School_path::createSchoolPath($label);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Editer une filière
     */
    public function editSchoolPath(Request $request, $id) {
        if ($request->isMethod('get')) {
            $school_path = School_path::getSchoolPathById($id);
            return view('admin.admin-school_path', ['school_path' => $school_path]);
        }

        if ($request->isMethod('post')) {
            $id = $request->input('id'); 
            $label = $request->input('label'); 
            $isCreated = School_path::updateSchoolPathById($id, $label);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Supprimer une filière
     */
    public function deleteSchoolPath($id) {
        School_path::deleteSchoolPathById($id);
        return redirect()->route('admin.home');
    }

    /**************************************** Niveaux d'étude ****************************************/

    /**
     * Créer un nouveau niveau d'étude
     */
    public function createSchoolLevel(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.admin-school_level');
        }

        if ($request->isMethod('post')) {
            $label = $request->input('label'); 
            $isCreated = School_level::createSchoolLevel($label);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Editer un niveau d'étude
     */
    public function editSchoolLevel(Request $request, $id) {
        if ($request->isMethod('get')) {
            $school_level = School_level::getSchoolLevelById($id);
            return view('admin.admin-school_level', ['school_level' => $school_level]);
        }

        if ($request->isMethod('post')) {
            $id = $request->input('id'); 
            $label = $request->input('label'); 
            $isCreated = School_level::updateSchoolLevelById($id, $label);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Supprimer un niveau d'étude
     */
    public function deleteSchoolLevel($id) {
        School_level::deleteSchoolLevelById($id);
        return redirect()->route('admin.home');
    }

    /**************************************** Secteurs d'activité ****************************************/

    /**
     * Créer un nouveau secteur d'activité
     */
    public function createSector(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.admin-sector');
        }

        if ($request->isMethod('post')) {
            $label = $request->input('label'); 
            $isCreated = Sector::createSector($label);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Editer un secteur d'activité
     */
    public function editSector(Request $request, $id) {
        if ($request->isMethod('get')) {
            $sector = Sector::getSectorById($id);
            return view('admin.admin-sector', ['sector' => $sector]);
        }

        if ($request->isMethod('post')) {
            $id = $request->input('id'); 
            $label = $request->input('label'); 
            $isCreated = Sector::updateSectorById($id, $label);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Supprimer un secteur d'activité
     */
    public function deleteSector($id) {
        Sector::deleteSectorById($id);
        return redirect()->route('admin.home');
    }

    /**************************************** Options de stand ****************************************/

    /**
     * Créer une nouvelle option de stand
     */
    public function createOption(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.admin-option');
        }

        if ($request->isMethod('post')) {
            $label = $request->input('label'); 
            $isCreated = Option::createOption($label);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Editer une option de stand
     */
    public function editOption(Request $request, $id) {
        if ($request->isMethod('get')) {
            $option = Option::getOptionById($id);
            return view('admin.admin-option', ['option' => $option]);
        }

        if ($request->isMethod('post')) {
            $id = $request->input('id'); 
            $label = $request->input('label'); 
            $isCreated = Option::updateOptionById($id, $label);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Supprimer une option de stand
     */
    public function deleteOption($id) {
        Option::deleteOptionById($id);
        return redirect()->route('admin.home');
    }

    /**************************************** Foire aux questions ****************************************/

    /**
     * Créer une nouvelle FAQ
     */
    public function createFaq(Request $request) {
        if ($request->isMethod('get')) {
            return view('admin.admin-faq');
        }

        if ($request->isMethod('post')) {
            $question = $request->input('question'); 
            $answer = $request->input('answer');
            $isCreated = Faq::createFaq($question, $answer);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Editer une FAQ
     */
    public function editFaq(Request $request, $id) {
        if ($request->isMethod('get')) {
            $faq = Faq::getFaqById($id);
            return view('admin.admin-faq', ['faq' => $faq]);
        }

        if ($request->isMethod('post')) {
            $id = $request->input('id'); 
            $question = $request->input('question'); 
            $answer = $request->input('answer'); 
            $isCreated = Faq::updateFaqById($id, $question, $answer);
            return redirect()->route('admin.home');
        }
    }

    /**
     * Supprimer une FAQ
     */
    public function deleteFaq($id) {
        Faq::deleteFaqById($id);
        return redirect()->route('admin.home');
    }
}
