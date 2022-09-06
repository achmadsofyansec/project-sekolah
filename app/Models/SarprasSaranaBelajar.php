<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasSaranaBelajar extends Model
{
    use HasFactory;
    protected $fillable = [
        'sarana_pembelajaran',
        'deskripsi',
        'fungsi',
        'foto',
    ];
}
