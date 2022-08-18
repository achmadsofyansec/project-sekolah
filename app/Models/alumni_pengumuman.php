<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumni_pengumuman extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'isi',
        'file',
    ];
}
