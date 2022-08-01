<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aktivitas_belajar extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_siswa',
        'kode_kelas',
        'kode_tahun_ajaran',
        'kode_jurusan',
    ];
}
