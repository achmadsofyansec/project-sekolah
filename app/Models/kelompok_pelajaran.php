<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelompok_pelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_kelompok',
        'nama_kelompok',
        'status_kelompok',
    ];
}
