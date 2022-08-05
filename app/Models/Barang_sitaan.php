<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_sitaan extends Model
{
    use HasFactory;
    protected $fillable = [
		'id_siswa',
		'id_kelas',
		'keterangan_sita',
		'tanggal_sita',
		'tahun_ajaran',
		'created_by'
    ];
}
