<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ppdbPengaturan extends Model
{
    use HasFactory;
    protected $fillable = [
                'portal_open',
                'pengumuman_open',
    ];
}
