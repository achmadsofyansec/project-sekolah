<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'kode_kelas' => 'X',
                'nama_kelas' => 'Sepuluh',
                'status_kelas' => 'Aktif',
            ],
            [
                'kode_kelas' => 'XI',
                'nama_kelas' => 'Sebelas',
                'status_kelas' => 'Aktif',
            ],
            [
                'kode_kelas' => 'XII',
                'nama_kelas' => 'Duabelas',
                'status_kelas' => 'Aktif',
            ],
        ];

        DB::table('kelas')->insert($kelas);
    }
}
