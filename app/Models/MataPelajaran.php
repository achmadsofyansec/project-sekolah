<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_kelompok',
        'kode_mapel',
        'nama_mapel',
        'status_mapel',
    ];
}
