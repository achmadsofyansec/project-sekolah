<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akademik_nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_nilai',
        'tgl_input',
        'kode_kelas',
        'kode_jurusan',
        'kode_tahun_ajaran',
        'type_nilai',
        'status_input',
        'desc_input',
    ];
}
