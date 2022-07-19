<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sekolahs')->insert([
            'kode_sekolah' => '00000',
            'nsm' => '0000',
            'npsn' => '0',
            'akreditasi' => 'A',
            'nama_sekolah' => 'SIPINTAR',
            'alamat_sekolah' => 'JL.Sipintar',
            'longtitude' => '0.0',
            'latitude' => '0.0',
            'kode_kecamatan' => '0',
            'kode_kelurahan' => '0.0',
            'kode_pos' => '65124',
            'nomor_hp' => '620000000',
            'email' => 'sipintar@gmail.com',
            'website' => '-',
            'logo_sekolah' => '-',
        ]);
    }
}
