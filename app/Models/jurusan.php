<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'status_jurusan',
    ];
}
