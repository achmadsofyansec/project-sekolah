<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu_agenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_agenda',
        'desc_agenda',
        'tgl_mulai_agenda',
        'tgl_selesai_agenda',
    ];
}
