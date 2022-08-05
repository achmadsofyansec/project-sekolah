<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point_pelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
    	'kode_poin',
		'nama_poin_pelanggaran',
		'poin'
    ];
}
