<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasKebutuhanTambahan extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'tahun_pengajuan',
        'jenis',
        'jumlah',
        'sifat',
        'rangking',
        'kategori_kondisi',
        'foto'
    ];
}
