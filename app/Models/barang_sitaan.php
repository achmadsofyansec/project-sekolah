<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_sitaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'tanggal_sita',
        'keterangan_sita',
        'created_by',
    ];
}
