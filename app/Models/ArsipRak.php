<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipRak extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_rak',
    ];
}
