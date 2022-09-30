<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasPeminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'unit',
        'jumlah',
        'status',
        'tanggal_kembali',
    ];
}
