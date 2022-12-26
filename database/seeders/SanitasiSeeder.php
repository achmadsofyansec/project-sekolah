<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanitasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sarpras_sanitasis')->insert([
            'id' => '1',
            'sumber_air_bersih' => 'Pilih Opsi',
            'sumber_air_minum' => 'Pilih Opsi',
            'kecukupan_air_bersih' => 'Pilih Opsi',
            'fasilitas_jamban_khusus' => 'Pilih Opsi',
            'tipe_toilet' => 'Pilih Opsi',
            'pembalut_cadangan' => 'Pilih Opsi',
            'cuci_tangan' => '0',
            'jumlah_cuci_tangan_kb' => '0',
            'jumlah_cuci_tangan_kr' => '0',
            'jumlah_sabun_cuci_tangan' => 'Pilih Opsi',
            'pembuangan_limbah' => 'Pilih Opsi',
            'waktu_pembuagan_limbah' => 'Pilih Opsi',
            'selokan_air' => 'Pilih Opsi',
            'tempat_sampah_kelas' => 'Pilih Opsi',
            'tempat_sampah_tertutup' => 'Pilih Opsi',            
            'cermin' => 'Pilih Opsi',
            'tps' => 'Pilih Opsi',
            'pengangkatan_sampah' => 'Pilih Opsi',          
            'anggaran_pemeliharaan' => 'Pilih Opsi',
            'kegiatan_rutin' => 'Pilih Opsi',
            'kemitraan_sekolah' => 'Pilih Opsi',
            'pemisahan_jamban' => 'Pilih Opsi',
            'jumlah_jamban_baik_lk' => '0',
            'jumlah_jamban_baik_pr' => '0',
            'jumlah_jamban_baik_br' => '0',
            'jumlah_jamban_rusak_lk' => '0',
            'jumlah_jamban_rusak_pr' => '0',
            'jumlah_jamban_rusak_br' => '0',         
        ]);
    }
}
