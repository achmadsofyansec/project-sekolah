<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahun_ajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_tahun_ajaran',
        'tahun_ajaran',
        'status_tahun_ajaran',
    ];
}
