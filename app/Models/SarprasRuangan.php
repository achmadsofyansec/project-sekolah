<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasRuangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'gedung',
        'jenis_ruangan',
        'nama',
        'kondisi',
        'tahun_dibangun',
        'panjang',
        'lebar',
        'foto',
    ];
}
