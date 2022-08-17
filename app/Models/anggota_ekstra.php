<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota_ekstra extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_daftar',
        'kode_siswa',
        'kode_ekstra',
    ];
}
