<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_buku extends Model
{
    use HasFactory;
    protected $table = "perpustakaan_peminjaman_bukus";

    protected $fillable = [
        'id_siswa',
    	'id_buku',
    	'status',
    	'jumlah_pinjam',
    	'durasi',
    	'tanggal_pinjam',
    	'status'
    ];
}
