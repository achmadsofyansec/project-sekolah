<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'data_siswas';
    protected $fillable = [
        'id',
        'nik',
        'nama',
        'nisn',
        'kip',
        'tmp_lahir',
        'tgl_lhr',
        'jns_kelamin',
        'agama',
        'anak',
        'ijml_saudara',
        'hobi',
        'cita_cita',
        'no_hp',
        'email',
        'biaya_sekolah',
        'kebutuhan_disabilitas',
        'kebutuhan_khusus',
        'alamat',
        'tmp_tinggal',
        'jarak_tinggal',
        'waktu_tempuh',
        'antar_jemput',
        'foto_siswa',
        'status_siswa',
    ];
}
