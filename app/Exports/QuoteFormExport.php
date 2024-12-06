<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class QuoteFormExport implements FromCollection, WithHeadings, WithColumnWidths
{
    protected $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Retourne les données à inclure dans l'Excel
     */
    public function collection()
    {
        $data = [];

        foreach ($this->formData as $key => $value) {
            $data[] = $value ?? '';
        }

        return collect([$data]);
    }

    /**
     * Retourne les en-têtes de colonnes
     */
    public function headings(): array
    {
        $headings = [];

        foreach ($this->formData as $key => $value) {
            $headings[] = $key ?? '';
        }

        return $headings;
    }

    /**
     * Personnalise la largeur des colonnes du fichier Excel
     */
    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 20, 
            'C' => 30, 
            'D' => 40, 
            'E' => 15, 
            'F' => 20, 
            'G' => 30, 
            'H' => 30, 
            'I' => 25, 
            'J' => 20, 
            'K' => 20, 
            'L' => 20, 
            'M' => 20, 
            'N' => 20, 
            'O' => 20, 
            'P' => 20, 
            'Q' => 20, 
            'R' => 20, 
            'S' => 20, 
            'T' => 20, 
            'U' => 20, 
            'V' => 20, 
            'W' => 20, 
            'X' => 20, 
            'Y' => 20, 
            'Z' => 20, 
        ];
    }
}
