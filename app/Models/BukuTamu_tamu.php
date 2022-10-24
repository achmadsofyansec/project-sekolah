<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu_tamu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_tamu',
        'asal_tamu',
        'alamat_tamu',
        'keperluan',
        'no_telp',
    ];
}
