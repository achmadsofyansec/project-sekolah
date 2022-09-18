<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasPeminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'kategori',
        'jumlah',
        'status',
    ];
}
