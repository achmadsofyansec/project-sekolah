<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung_perpus extends Model
{
    use HasFactory;

    protected $fillable = [
		'nis',
		'nama_siswa',
		'kelas',
		'keperluan',
    ];
}
