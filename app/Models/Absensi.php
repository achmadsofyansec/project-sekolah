<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_absensi',
        'kode_siswa',
        'jenis_absen',
        'keterangan',
        'alasan',
        'created_by'
    ];
}
