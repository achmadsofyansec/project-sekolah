<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasGedung extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_gedung',
        'nama_lahan',
        'jml_lantai',
        'kepemilikan',
        'kondisi_kerusakan',
        'kategori_kondissi',
        'tahun_dibangun',
        'luas_gedung',
    ];
}
