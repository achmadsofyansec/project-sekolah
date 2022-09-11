<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasDataAset extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit',
        'kategori',
        'jml_baik',
        'jml_rusak_ringan',
        'jml_rusak_berat',
        'foto',
    ];
}
