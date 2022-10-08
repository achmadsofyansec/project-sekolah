<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            [
                'kode_jurusan' => 'RPL',
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'status_jurusan' => 'Aktif',
            ],
            [
                'kode_jurusan' => 'TKJ',
                'nama_jurusan' => 'Teknik Komputer Jaringan',
                'status_jurusan' => 'Aktif',
            ],
            [
                'kode_jurusan' => 'MEKATRONIKA',
                'nama_jurusan' => 'Mekatronika',
                'status_jurusan' => 'Aktif',
            ],
        ];

        DB::table('jurusans')->insert($jurusan);
    }
}
