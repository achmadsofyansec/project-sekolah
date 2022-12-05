<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ppdbOrtuSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
                    'nik',
                    'id_siswa',
                    'nama_ortu',
                    'tmp_lahir_ortu',
                    'tgl_lhr_ortu',
                    'status_ortu',
                    'pendidikan_terakhir_ortu',
                    'pekerjaan_terakhir_ortu',
                    'domisili_ortu',
                    'no_tlp_ortu',
                    'penghasilan_ortu',
                    'alamat_ortu',
                    'tmp_tinggal_ortu',
                    'jns_ortu',
    ];
}

