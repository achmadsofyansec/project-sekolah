<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_ekstra',
        'nama_ekstra',
        'desc_ekstra',
        'wajib_ekstra',
        'status_ekstra',
    ];
}
