<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\School_level;
use App\Models\School_path;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class CvController extends Controller
{
    /**
     * Renvoie sur la page listant tous les CV
     */
    public function getAllCvs() {
        $students = Student::getAllStudents();
        $all_levels = School_level::getAllSchoolLevels();
        $all_paths = School_path::getAllSchoolPaths();
        return view('cvs', ['students' => $students, 
            'all_levels' => $all_levels,
            'all_paths'=> $all_paths]);
    }

    /**
     * Télécharger tous les CVs étudiants dans un zip
     */
    public function downloadAllCvs(Request $request)
    {
        $allowedNames = $request->input('names', []); // Récupérer la liste des noms envoyée

        if (empty($allowedNames)) {
            return response()->json(['error' => 'No names provided.'], 400);
        }

        $folderPath = storage_path('app/public/cvs');
        $zipFileName = 'cvs_etudiants_esiee.zip';
        $zipFilePath = storage_path($zipFileName);

        if (!File::exists($folderPath)) {
            return response()->json(['error' => 'Folder does not exist.'], 404);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $files = File::files($folderPath);
            foreach ($files as $file) {
                if ($file->getExtension() === 'pdf' && in_array($file->getFilename(), $allowedNames)) {
                    $zip->addFile($file->getRealPath(), $file->getFilename());
                }
            }
            $zip->close();
        } else {
            return response()->json(['error' => 'Failed to create ZIP file.'], 500);
        }

        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

}
