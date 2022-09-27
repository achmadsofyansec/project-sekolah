<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportImport extends Controller
{
    //
    public function ExportSiswa()
    {
        Excel::download(new SiswaExport,'siswa.xlsx');
        return redirect()->back();
    }
}
