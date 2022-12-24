<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export_lahan(Request $request)
	{
		return Excel::download(new SiswaExport, 'siswa.xlsx');
	}
}
