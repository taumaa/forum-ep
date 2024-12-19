<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AllCompaniesExport;
use App\Exports\AllStudentsExport;
use App\Models\Company;
use App\Models\School_level;
use App\Models\School_path;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class TotoController extends Controller
{
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

    /**
     * Enregistre le logo d'une entreprise /!\ FAIRE PASSER LE NOM ENTREPRISE EN BACK
     */
    public function uploadLogo (Request $request) {
        if (true) { // checker si on est connecté en tant qu'entreprise /!\
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg', 
                'name' => 'required|string',
            ]);

            // Vérifier si un fichier a été téléchargé
            if ($request->hasFile('image')) {
                // Récupérer l'image téléchargée
                $image = $request->file('image');

                // Mise à jour du nom de l'image pour qu'il corresponde à son entreprise
                $extension = $image->getClientOriginalExtension();
                $imageName = "logo-" . $request->input('name') . "." . $extension;

                // Enregistrer l'image dans le dossier 'company-logos'
                $path = $image->storeAs('company-logos', $imageName, 'public');

                // Retourner une réponse ou rediriger
                return back()->with('success', 'Image téléchargée avec succès !');
            }

            return back()->with('error', 'Aucune image téléchargée !');
        }
        return view('errors.404');
    }

    /**
     * Enregistre le CV d'un étudiant /!\ FAIRE PASSER LE NOM ETUDIANT EN BACK PASKE EN FRONT OSKOUR LA SÉCURITÉ
     */
    public function uploadCv (Request $request) {
        if (true) { // checker si on est connecté en tant qu'étudiant /!\
            $request->validate([
                'cv' => 'required|mimes:pdf', 
                'student' => 'required|string',
            ]);

            // Vérifier si un fichier a été téléchargé
            if ($request->hasFile('cv')) {
                // Récupérer le CV téléchargé
                $cv = $request->file('cv');

                // Mise à jour du nom du CV pour qu'il corresponde à son étudiant
                $cvName = "cv-" . $request->input('student') . ".pdf";

                // Enregistrer le CV dans le dossier 'cvs'
                $path = $cv->storeAs('cvs', $cvName, 'public');

                // Retourner une réponse ou rediriger
                return back()->with('success', 'CV téléchargé avec succès !');
            }

            return back()->with('error', 'Aucun CV téléchargé !');
        }
        return view('errors.404');
    }

}
