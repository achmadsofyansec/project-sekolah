<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akademik_pindah_kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_siswa',
        'status_pindah',
        'keterangan',
        'created_by'
    ];
}
