<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipLemari extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lemari',
    ];
}
