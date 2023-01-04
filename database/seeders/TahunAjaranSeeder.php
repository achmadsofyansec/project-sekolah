<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tahun_ajaran = [
            [
                'kode_tahun_ajaran' => 'EK-100',
                'tahun_ajaran' => '2019/2020',
                //'semester' => '2',
                'status_tahun_ajaran' => 'Nonaktif',
            ],
            [
                'kode_tahun_ajaran' => 'EK-101',
                'tahun_ajaran' => '2021/2022',
                //'semester' => '1',
                'status_tahun_ajaran' => 'Nonaktif',
            ],
            [
                'kode_tahun_ajaran' => 'EK-102',
                'tahun_ajaran' => '2021/2022',
                //'semester' => '2',
                'status_tahun_ajaran' => 'Aktif',
            ]
        ];

        DB::table('tahun_ajarans')->insert($tahun_ajaran);
    }
}
