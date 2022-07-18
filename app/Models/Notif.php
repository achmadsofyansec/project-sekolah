<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pengumuman',
        'isi_pengumuman',
        'file_pengumuman',
        'status_pengumuman',
    ];

}
