<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan_penerimaan_lain extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_penerimaan',
        'penerimaan_dari',
        'methode_bayar',
        'desc_penerimaan'
    ];
}
