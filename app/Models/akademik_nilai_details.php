<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akademik_nilai_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_nilai',
        'kode_siswa',
        'nilai',
    ];
}
