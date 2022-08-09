<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipMap extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_map',
    ];
}
