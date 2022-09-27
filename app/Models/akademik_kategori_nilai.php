<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akademik_kategori_nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_nilai',
    ];
}
