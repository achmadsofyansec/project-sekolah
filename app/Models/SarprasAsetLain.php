<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasAsetLain extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit',
        'fungsi',
        'foto',
    ];
}
