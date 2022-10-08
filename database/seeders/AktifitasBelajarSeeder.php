<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktifitasBelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aktifitas_belajar = [
            [
                'kode_siswa' => '123456789',
                'kode_kelas' => 'X',
                'kode_tahun_ajaran' => 'EK-100',
                'kode_jurusan' => 'RPL',
                'status_aktivitas' => '1',
            ],
            [
                'kode_siswa' => '987654321',
                'kode_kelas' => 'X',
                'kode_tahun_ajaran' => 'EK-100',
                'kode_jurusan' => 'RPL',
                'status_aktivitas' => '1',
            ],
            [
                'kode_siswa' => '1111111',
                'kode_kelas' => 'XI',
                'kode_tahun_ajaran' => 'EK-101',
                'kode_jurusan' => 'MEKATRONIKA',
                'status_aktivitas' => '1',
            ],
            [
                'kode_siswa' => '22222222',
                'kode_kelas' => 'XI',
                'kode_tahun_ajaran' => 'EK-101',
                'kode_jurusan' => 'MEKATRONIKA',
                'status_aktivitas' => '1',
            ],
            [
                'kode_siswa' => '33333333',
                'kode_kelas' => 'XII',
                'kode_tahun_ajaran' => 'EK-102',
                'kode_jurusan' => 'RPL',
                'status_aktivitas' => '1',
            ],
        ];

        DB::table('aktivitas_belajars')->insert($aktifitas_belajar);
    }
}
