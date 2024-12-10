<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AllStudentsExport implements FromCollection, WithHeadings, WithColumnWidths
{
    protected $studentsData;

    public function __construct($studentsData)
    {
        $this->studentsData = $studentsData;
    }

    /**
     * Retourne les données à inclure dans l'Excel
     */
    public function collection()
    {
        return collect($this->studentsData)->map(function ($student) {
            return [
                $student->last_name ?? '',
                $student->first_name ?? '',
                $student->User->email ?? '',
                $student->schoolLevel->school_level_label ?? '',
                $student->schoolPath->school_path_label ?? '',
                $student->abroad ?? '',
                $student->cv ?? '',
            ];
        });
    }

    /**
     * Retourne les en-têtes de colonnes
     */
    public function headings(): array
    {
        return [
            'Nom de famille',
            'Prénom',
            'Email',
            'Niveau d\'étude',
            'Filière',
            'À l\'étranger',
            'CV',
        ];
    }

    /**
     * Personnalise la largeur des colonnes du fichier Excel
     */
    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30, 
            'C' => 30, 
            'D' => 30, 
            'E' => 30, 
            'F' => 30, 
            'G' => 30, 
            'H' => 30, 
            'I' => 30, 
            'J' => 30, 
            'K' => 30, 
            'L' => 30, 
            'M' => 30, 
            'N' => 30, 
            'O' => 30, 
            'P' => 30, 
            'Q' => 30, 
            'R' => 30, 
            'S' => 30, 
            'T' => 30, 
            'U' => 30, 
            'V' => 30, 
            'W' => 30, 
            'X' => 30, 
            'Y' => 30, 
            'Z' => 30, 
        ];
    }
}
