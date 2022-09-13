<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biaya_siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_biaya',
        'pos_biaya',
        'kartu_spp',
        'penunggakan'
    ];
}
