<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_buku_dts extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_peminjaman_dt',
		'id_peminjaman',
		'id_buku',
		'jumlah',
		'tanggal_pinjam',
		'tanggal_kembali',
		'durasi',
		'tanggal_kembali_asli',
		'telat',
		'denda',
		'status_input_dt',
		'status_pinjam_dt'
   ];
}
