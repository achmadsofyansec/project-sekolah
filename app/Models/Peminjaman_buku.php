<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_buku extends Model
{
    use HasFactory;
    protected $table = "peminjaman_bukus";

    protected $fillable = [
    	'id_siswa',
    	'id_buku',
    	'jumlah_pinjam',
    	'durasi',
    ];
}
