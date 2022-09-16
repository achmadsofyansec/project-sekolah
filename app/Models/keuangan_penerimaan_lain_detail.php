<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan_penerimaan_lain_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_penerimaan',
        'pos_terima',
        'detail_keterangan',
        'detail_jumlah'
    ];
}
