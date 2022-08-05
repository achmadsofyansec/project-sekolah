<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung_perpus extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_pengunjung',
		'nis',
		'id_kelas',
		'keperluan',
		'tanggal'
    ];
}
