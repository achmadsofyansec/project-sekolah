<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasPeminjamans extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_peminjaman',
        'kode_siswa',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status_peminjaman',
        'desc_peminjaman',
    ];
}
