<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keuangan_detail_nonbulanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_non_bulanan',
        'tgl_input_detail',
        'jenis_pembayaran_detail',
        'nominal_detail',
    ];
}
