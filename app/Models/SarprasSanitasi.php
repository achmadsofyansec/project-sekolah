<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasSanitasi extends Model
{
    use HasFactory;
    protected $fillable = [
            'sumber_air_bersih',
            'sumber_air_minum',
            'kecukupan_air_bersih',
            'fasilitas_jamban_khusus',
            'tipe_toilet',
            'pembalut_cadangan',
            'cuci_tangan',
            'jumlah_cuci_tangan_kb',
            'jumlah_cuci_tangan_kr',
            'jumlah_sabun_cuci_tangan',
            'pembuangan_limbah',
            'waktu_pembuagan_limbah',
            'selokan_air',
            'tempat_sampah_kelas',
            'tempat_sampah_tertutup',            
            'cermin',
            'tps',
            'pengangkatan_sampah',          
            'anggaran_pemeliharaan',
            'kegiatan_rutin',
            'kemitraan_sekolah',
            'pemisahan_jamban',
            'jumlah_jamban_baik_lk',
            'jumlah_jamban_baik_pr',
            'jumlah_jamban_baik_br',
            'jumlah_jamban_rusak_lk',
            'jumlah_jamban_rusak_pr',
            'jumlah_jamban_rusak_br',
    ];
}
