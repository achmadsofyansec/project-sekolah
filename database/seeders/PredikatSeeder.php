<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PredikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('predikats')->insert([
            'dari' => '0',
            'sampai' => '40',
            'grade' => 'D',
            'keterangan' => 'Kurang',
        ]);
        DB::table('predikats')->insert([
            'dari' => '40',
            'sampai' => '60',
            'grade' => 'C',
            'keterangan' => 'Cukup',
        ]);
        DB::table('predikats')->insert([
            'dari' => '60',
            'sampai' => '80',
            'grade' => 'B',
            'keterangan' => 'Baik',
        ]);
        DB::table('predikats')->insert([
            'dari' => '80',
            'sampai' => '100',
            'grade' => 'A',
            'keterangan' => 'Sangat Baik',
        ]);
    }
}
