<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = "data_bukus";
    protected $fillable = [
    	'kode_buku',
    	'total_halaman',
    	'judul_buku',
		'pengarang',
		'penerbit',
		'tahun_terbit',
		'tempat_terbit',
		'tinggi_buku',
		'ddc',
		'isbn',
		'jumlah_buku',
		'tanggal_masuk',
		'no_inventaris',
		'lokasi',
		'deskripsi_buku',
		'foto_buku',
		'id_sumber',
		'id_kategori',
		'stok'
    ];
}
