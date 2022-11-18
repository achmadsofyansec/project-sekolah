<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class integrasi_wa extends Model
{
    use HasFactory;
    protected $fillable = [
        'wa_name',
        'wa_desc',
        'wa_number',
        'wa_status',
        'wa_multidevices',
    ];
}
