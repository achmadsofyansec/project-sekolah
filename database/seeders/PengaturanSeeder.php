<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ppdb_pengaturans')->insert([
            'id' => '1',
            'portal_open' => '2022-12-13',
            'pengumuman_open' => '2022-12-13',           
        ]);
    }
}
