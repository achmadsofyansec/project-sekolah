<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_buku extends Model
{
    use HasFactory;

    protected $fillable = [
    	'no_peminjaman',
    	'id_siswa',
    	'id_kelas',
    ];
}
