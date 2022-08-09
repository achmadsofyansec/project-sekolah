<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipJenisDokumen extends Model
{
    use HasFactory;
    protected $fillable = [      
        'nama_jenis_dokumen',
    ];
}
