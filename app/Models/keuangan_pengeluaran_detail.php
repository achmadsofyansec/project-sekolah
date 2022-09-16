<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan_pengeluaran_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_pengeluaran',
        'pos_sumber',
        'pos_keluar',
        'detail_keterangan',
        'detail_jumlah'
    ];
}
