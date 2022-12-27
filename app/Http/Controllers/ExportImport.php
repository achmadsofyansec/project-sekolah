<?php

namespace App\Http\Controllers;

use App\Exports\BukuExport;
use App\Exports\PeminjamanExport;
use App\Exports\PengunjungExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExportImport extends Controller
{
    public function ExportBuku(){
        $date = date('Ymdhis');
        return Excel::download(new BukuExport,$date.'_buku.xlsx');
    }

    public function ExportPeminjaman(){
        $date = date('Ymdhis');
        return Excel::download(new PeminjamanExport,$date.'_peminjaman.xlsx');
    }
    public function ExportPengunjung(){
        $date = date('Ymdhis');
        return Excel::download(new PengunjungExport,$date.'_pengunjung.xlsx');
    }
}