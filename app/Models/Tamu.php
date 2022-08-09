<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nama',
        'asal',
        'alamat',
        'keperluan',
        'telepon',
    ];
}
