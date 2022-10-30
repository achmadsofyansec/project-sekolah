<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasDenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_siswa',
        'kode_denda',
        'unit',
        'pelanggaran',
        'total_denda',
        'status',
    ];
}
