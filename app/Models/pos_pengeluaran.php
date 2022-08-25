<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pos_pengeluaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_pos',
        'nama_pos',
        'desc_pos',
    ];
}
