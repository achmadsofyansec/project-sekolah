<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasPeminjamanDetail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kode_peminjaman',
        'kode_siswa',
        'unit',
        'jumlah',
    ];
}
