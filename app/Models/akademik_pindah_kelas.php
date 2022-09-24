<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akademik_pindah_kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_pengajuan',
        'tgl_disetujui',
        'kode_siswa',
        'kode_kelas_siswa',
        'kode_kelas_tujuan',
        'status_pindah',
        'ket_pindah',
    ];
}
