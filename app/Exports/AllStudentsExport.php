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
            'A' => 25,
            'B' => 25, 
            'C' => 25, 
            'D' => 25, 
            'E' => 25, 
            'F' => 25, 
            'G' => 25, 
            'H' => 25, 
            'I' => 25, 
            'J' => 25, 
            'K' => 25, 
            'L' => 25, 
            'M' => 25, 
            'N' => 25, 
            'O' => 25, 
            'P' => 25, 
            'Q' => 25, 
            'R' => 25, 
            'S' => 25, 
            'T' => 25, 
            'U' => 25, 
            'V' => 25, 
            'W' => 25, 
            'X' => 25, 
            'Y' => 25, 
            'Z' => 25, 
        ];
    }
}
