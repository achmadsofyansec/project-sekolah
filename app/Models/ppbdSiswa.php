<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ppbdSiswa extends Model
{
    use HasFactory;
     protected $fillable = [
                    'status_siswa',
                    'nik',
                    'nisn',
                    'kip',
                    'nama',
                    'tmp_lahir',
                    'tgl_lhr',
                    'jns_kelamin',
                    'hobi',
                    'cita_cita',
                    'agama',
                    'alamat',
                    'anak',
                    'jml_saudara',
                    'no_hp',
                    'email',
                    'biaya_sekolah',
                    'kebutuhan_disabilitas',
                    'kebutuhan_khusus',
                    'tmp_tinggal',
                    'jarak_tinggal',
                    'waktu_tempuh',
                    'antar_jemput',
                    'foto_siswa',
    ];
}
