<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasLahan extends Model
{
    use HasFactory;
    protected $fillable = [
            'nama_lahan',
            'alamat',
            'luas',
            'luas_digunakan',
            'status_lahan', 
            'kelurahan',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'kode_pos',
            'kategori_geografis',
            'wilayah',
            'jarak_provinsi',
            'jarak_kabupaten',
            'jarak_kecamatan',
            'jarak_kemenag',
            'jarak_ra',
            'jarak_mi',
            'jarak_mts',
            'jarak_sd',
            'jarak_smp',
            'jarak_sma',
            'jarak_pontren',
            'jarak_ptki',
    ];
}
