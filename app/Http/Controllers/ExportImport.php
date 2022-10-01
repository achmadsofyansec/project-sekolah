<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\Exports\SiswaExport;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;

class ExportImport extends Controller
{
    //
    
    public function ExportSiswa()
    {
        $date = date('Ymdhis');
        return Excel::download(new SiswaExport,$date.'_siswa.xlsx');
    }
    public function ExportGuru(){
        $date = date('Ymdhis');
        return Excel::download(new GuruExport,$date.'_guru.xlsx');
    }
}
