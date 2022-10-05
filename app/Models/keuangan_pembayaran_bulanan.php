<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan_pembayaran_bulanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_siswa',
        'kode_kelas',
        'kode_jenis_pembayaran',
        'kode_biaya_siswa',
        'bulan_pembayaran',
        'tagihan_pembayaran',
        'nominal_pembayaran',
        'tgl_bayar',
    ];
}
