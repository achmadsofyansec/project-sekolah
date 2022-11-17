<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class integrasi_outbox extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_tujuan',
        'type',
        'pesan',
        'status',
        'app_id',
    ];
}
