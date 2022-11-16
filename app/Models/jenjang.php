<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenjang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_jenjang',
        'nama_jenjang',
        'ket_jenjang',
    ];
}
