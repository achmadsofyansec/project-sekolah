<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';

    protected $fillable = [
        'kode_sekolah',
        'nsm',
        'npsn',
        'akreditasi',
        'nama_sekolah',
        'alamat_sekolah',
        'longtitude',
        'latitude',
        'kode_kecamatan',
        'kode_kelurahan',
        'kode_pos',
        'nomor_hp',
        'email',
        'website',
        'logo_sekolah',

    ];
}
