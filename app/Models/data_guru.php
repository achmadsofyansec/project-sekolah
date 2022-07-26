<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'nik',
        'niptk',
        'nuptk',
        'nama',
        'tmp_lahir',
        'tgl_lhr',
        'jns_kelamin',
        'agama',
        'kewarganegaraan',
        'alamat',
        'kecamatan',
        'kelurahan',
        'jabatan',
        'no_hp',
        'no_telp',
        'email',
        'jenis_guru',
        'foto_guru',
    ];
}
