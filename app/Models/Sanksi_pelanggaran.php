<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi_pelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
    	'kode_sanksi',
		'dari_poin',
		'sampai_poin',
		'sanksi'
    ];
}
