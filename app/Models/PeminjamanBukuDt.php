<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBukuDt extends Model
{
    use HasFactory;

    protected $table = "perpustakaan_peminjaman_buku_dts";
    protected $fillable = [
        'id_siswa',
        'kode_buku',
        'jumlah',
        'tanggal_kembali',
        'status',
        'desc_pinjam',
        'kondisi',
        'tanggal_pinjam',
    ];
}
