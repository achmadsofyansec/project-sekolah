<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akademik_nilai_prestasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_siswa',
        'nama_lomba',
        'nama_penyelenggara',
        'tahun_lomba',
        'tingkat_lomba',
        'peringkat_lomba',
        'keterangan_lomba',
    ];
}
