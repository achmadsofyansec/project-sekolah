<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan_tabungan_siswa_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_detail',
        'kode_tabungan',
        'nominal_detail',
        'saldo_awal_detail',
        'saldo_akhir_detail',
        'type_detail',
        'keterangan_detail'
    ];
}
