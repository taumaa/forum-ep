<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $primaryKey = 'sector_id';
    public $timestamps = false;

    protected $fillable = [
        'sector_label',
    ];

    public static function getAllSectors() {
        $all_sectors = Sector::all();
        return $all_sectors;
    }
}
