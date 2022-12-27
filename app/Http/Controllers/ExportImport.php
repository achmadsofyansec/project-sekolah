<?php

namespace App\Http\Controllers;

use App\Exports\AlumniExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExportImport extends Controller
{
    public function ExportAlumni(){
        $date = date('Ymdhis');
        return Excel::download(new AlumniExport,$date.'_alumni.xlsx');
    }
}