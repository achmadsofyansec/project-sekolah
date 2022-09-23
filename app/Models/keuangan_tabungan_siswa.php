<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan_tabungan_siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_tabungan',
        'kode_siswa',
        'saldo_tabungan',
        'status_tabungan',
        'desc_tabungan'
    ];
}
