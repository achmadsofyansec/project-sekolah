<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan_pengeluaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_pengeluaran',
        'methode_bayar',
        'desc_pengeluaran'
    ];
}
