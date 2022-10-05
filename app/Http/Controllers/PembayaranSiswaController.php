<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use App\Models\keuangan_pembayaran_nonbulanan;
use App\Models\tahun_ajaran;
use Illuminate\Http\Request;

class PembayaranSiswaController extends Controller
{
    
    public function index(Request $request)
    {
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $data = "";
        $data_bulanan = "";
        $data_non_bulanan = "";
        $req = $request;
        if($request->tahun_ajaran != null && $request->kode_siswa != null){
            $data = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
            ->join("kelas","aktivitas_belajars.kode_kelas",'=','kelas.kode_kelas')
            ->join("jurusans","aktivitas_belajars.kode_jurusan",'=','jurusans.kode_jurusan')
            ->where([['data_siswas.id','=',$request->kode_siswa]])
            ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','kelas.*','jurusans.*'])->first();            
        }
        return view('pembayaran_siswa.index',compact(['tahun_ajaran','req','siswa','data','data_bulanan','data_non_bulanan']));
    }
}
