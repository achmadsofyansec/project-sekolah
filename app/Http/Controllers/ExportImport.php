<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;

use Maatwebsite\Excel\Facades\Excel;

class ExportImport extends Controller
{
    //
    public function ExportSiswa()
    {
        return Excel::download(new SiswaExport,'siswa.xlsx');
    }
}
