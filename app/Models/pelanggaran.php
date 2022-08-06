<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_poin_pelanggaran',
        'id_siswa',
        'id_kelas',
        'tanggal_pelanggaran',
        'poin_minus',
        'tahun_ajaran',
        'created_by',
    ];
}
