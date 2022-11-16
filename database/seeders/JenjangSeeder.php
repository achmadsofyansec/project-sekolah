<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenjangs')->insert([[
            'kode_jenjang' => '01',
            'nama_jenjang' => 'RA',
            'ket_jenjang' => 'Raudhatul Athfal',
        ],
        [
            'kode_jenjang' => '02',
            'nama_jenjang' => 'MI',
            'ket_jenjang' => 'Madarasah Ibtidaiyah',
        ],[
            'kode_jenjang' => '03',
            'nama_jenjang' => 'SD',
            'ket_jenjang' => 'Sekolah Dasar',
        ],[
            'kode_jenjang' => '04',
            'nama_jenjang' => 'MTS',
            'ket_jenjang' => 'Madarasah Tsanawiyah',
        ],[
            'kode_jenjang' => '05',
            'nama_jenjang' => 'SMP',
            'ket_jenjang' => 'Sekolah Menengah Pertama',
        ],
        [
            'kode_jenjang' => '06',
            'nama_jenjang' => 'MA',
            'ket_jenjang' => 'Madarasah Aliyah',
        ],
        [
            'kode_jenjang' => '07',
            'nama_jenjang' => 'SMA',
            'ket_jenjang' => 'Sekolah Menengah Atas',
        ],
        [
            'kode_jenjang' => '08',
            'nama_jenjang' => 'SMK',
            'ket_jenjang' => 'Sekolah Menengah Kejuruan',
        ],
    ]);
    }
}
