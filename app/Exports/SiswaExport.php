<?php

namespace App\Exports;

use App\Models\data_siswa;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SiswaExport implements FromCollection{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return data_siswa::join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
                        ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
                        ->join('jurusans','aktivitas_belajars.kode_jurusan','=','jurusans.kode_jurusan')
                        ->get();
    }
}
