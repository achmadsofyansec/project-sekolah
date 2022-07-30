<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_jadwal',
        'kode_guru',
        'kode_mapel',
        'kode_kelas',
        'kode_tahun_ajaran',
    ];
}
