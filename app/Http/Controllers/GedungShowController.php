<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasLahan;
use App\Models\SarprasGedung;
use App\Models\SarprasKepemilikanLahan;
use App\Models\SarprasPenggunaanLahan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class GedungShowController extends Controller
{
    public function index()
    {
        $lahan = DB::table('sarpras_lahans')->select(['sarpras_lahans.*'])->get();
        $penggunaan = SarprasLahan::join('sarpras_gedungs', 'sarpras_lahans.nama_lahan', '=', 'sarpras_gedungs.nama_lahan')
        ->join('sarpras_ruangans', 'sarpras_gedungs.nama_gedung', '=', 'sarpras_ruangans.nama_gedung')
        ->get();
        $kepemilikan = DB::table('sarpras_lahans')
                    ->join('sarpras_gedungs', 'sarpras_lahans.nama_lahan', '=', 'sarpras_gedungs.nama_lahan')
                    ->join('sarpras_ruangans', 'sarpras_gedungs.nama_gedung', '=', 'sarpras_ruangans.nama_gedung')
                    ->get();            
        return view('asset_tetap.lahan.gedungall',compact (['lahan', 'kepemilikan', 'penggunaan']));
    }
}
