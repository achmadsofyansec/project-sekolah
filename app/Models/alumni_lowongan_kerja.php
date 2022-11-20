<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumni_lowongan_kerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'isi',
        'file',
        'tanggal'
    ];
}
