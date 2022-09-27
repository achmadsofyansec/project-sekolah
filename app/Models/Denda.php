<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $table = "perpustakaan_dendas";
    protected $fillable = [
		'tarif_denda'
    ];
}
