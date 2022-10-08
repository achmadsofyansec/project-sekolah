<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;

class ExportImport extends Controller
{
    //

    public function ExportSiswa(Request $request)
    {
        $kelas = $request->kode_export_kelas != null ? $request->kode_export_kelas :null;
        $jurusan = $request->kode_export_jurusan != null ? $request->kode_export_jurusan :null;
        $data = new SiswaExport($kelas,$jurusan);
        $date = date('Ymdhis');
        return Excel::download($data,$date.'_siswa.xlsx');
    }
    public function ExportGuru(){
        $date = date('Ymdhis');
        return Excel::download(new GuruExport,$date.'_guru.xlsx');
    }
}
