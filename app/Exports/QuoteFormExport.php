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
        return collect([
            [
                $this->formData['company_name'] ?? '',
                $this->formData['siret'] ?? '',
                $this->formData['tva'] ?? '',
                $this->formData['address'] ?? '',
                $this->formData['postal_code'] ?? '',
                $this->formData['city'] ?? '',
                $this->formData['order_slip'] ?? '',
                $this->formData['name'] ?? '',
                $this->formData['stand'] ?? '',
            ]
        ]);
    }

    /**
     * Retourne les en-têtes de colonnes
     */
    public function headings(): array
    {
        return [
            'Nom de l\'entreprise',
            'N° de SIRET',
            'N° de TVA intracommunautaire',
            'Adresse de facturation',
            'Code postal',
            'Ville',
            'Bon de commande interne',
            'Nom & Prénom du signataire',
            'Type de stand',
        ];
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
