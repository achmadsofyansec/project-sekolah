<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'ruangan',
        'lemari',
        'rak',
        'box',
        'map',
        'urut',
        'tanggal_dokumen',
        'jenis_dokumen',
        'nomor_dokumen',
        'nama_dokumen',
        'deskripsi',
        'file',
        'tahun_ajaran',

    ];
}
