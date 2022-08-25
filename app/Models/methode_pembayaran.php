<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class methode_pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_methode',
        'nama_methode',
        'desc_methode',
    ];
}
