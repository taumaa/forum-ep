<?php

namespace App\Http\Controllers\Admin;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AllCompaniesExport;
use App\Exports\AllStudentsExport;
use App\Models\Student;
use App\Models\Sector;
use App\Models\Company;
use App\Models\Setting;
use App\Models\Forum_edition;
use App\Models\Faq;
use App\Models\Option;
use App\Models\School_level;
use App\Models\School_path;
use App\Models\User;
use App\Models\Quote;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $settings = Setting::getAllSettings();
        $quotes = Quote::getUnvalidatedQuotes();
        return view('admin.home', 
            ['user' => $user,
            'editions' => $editions,
            'school_paths' => $school_paths,
            'school_levels' => $school_levels,
            'sectors' => $sectors,
            'options' => $options,
            'faqs' => $faqs,
            'settings' => $settings,
            'quotes' => $quotes]);
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

    /**************************************** Paramètres globaux ****************************************/

    /**
     * Editer les paramètres globaux du site
     */
    public function editSettings(Request $request) {
        $description = $request->input('description'); 
        $building = $request->input('building'); 
        $logo = 'logo1.png';
        $ico = 'ico1.png';
        $image = 'ESIEE-Home-Main-Picture.webp';
        $video = 'video1.mp';
        $isCreated = Setting::updateSettingById(1, $logo, $ico, $description, $image, $video, $building);
        return redirect()->route('admin.home');
    }

    /**************************************** Administrateurs ****************************************/

    /**
     * Ajouter un administrateur
     */
    public function addAdmin(Request $request) {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => User::TYPE_ADMIN,
        ]);
        return redirect()->route('admin.home');
    }

    /**************************************** Extraction Excel ****************************************/

    /**
     * Récupère la liste des entreprises dans un excel
     */
    public function getAllCompanies () {
        if (true) { // checker si on est connecté en tant qu'admin /!\
            $companies = Company::getAllCompanies();
            $fileName = 'Liste_entreprises.xlsx';
            return Excel::download(new AllCompaniesExport($companies), $fileName);
        }
        return view('errors.404');
    }

    /**
     * Récupère la liste des étudiants dans un excel
     */
    public function getAllStudents () {
        if (true) { // checker si on est connecté en tant qu'admin /!\
            $students = Student::getAllStudents();
            $fileName = 'Liste_etudiants.xlsx';
            return Excel::download(new AllStudentsExport($students), $fileName);
        }
        return view('errors.404');
    }

    /**************************************** Demandes de devis ****************************************/
    /**
     * Récupère les nouvelles demandes de devis
     */
    // public function getUnvalidatedQuotes () {
    //     if (true) { // checker si on est connecté en tant qu'admin /!\
    //         $quotes = Quote::getUnvalidatedQuotes();
    //     }
    //     return redirect()->route('admin.home');
    // }

    /**
     * Valide une demande de devis
     */
    public function validateQuote ($id) {
        if (true) { // checker si on est connecté en tant qu'admin /!\
            $quote = Quote::validateQuoteById($id);
        }
        return redirect()->route('admin.home');
    }

    /**
     * Supprime une demande de devis
     */
    public function deleteQuote ($id) {
        if (true) { // checker si on est connecté en tant qu'admin /!\
            $quote = Quote::deleteQuoteById($id);
        }
        return redirect()->route('admin.home');
    }
}
