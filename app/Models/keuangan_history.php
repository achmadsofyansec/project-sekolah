<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan_history extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_history',
        'histori_type_pembayaran',
        'kode_biaya',
        'history_tagihan',
        'history_pembayaran',
        'kode_siswa',
        'ket_history',
    ];
}
