<?php

namespace App\Http\Controllers;

use App\Models\biaya_siswa;
use App\Models\data_siswa;
use App\Models\keuangan_detail_nonbulanan;
use App\Models\keuangan_pembayaran_bulanan;
use App\Models\keuangan_pembayaran_nonbulanan;
use App\Models\methode_pembayaran;
use App\Models\tahun_ajaran;
use Illuminate\Http\Request;

class PembayaranSiswaController extends Controller
{
    
    public function index(Request $request)
    {
        
        $tahun_ajaran = tahun_ajaran::latest()->get();
        $jenis_bayar = methode_pembayaran::latest()->get();
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $bulanan = biaya_siswa::join('pos_penerimaans','biaya_siswas.pos_biaya','=','pos_penerimaans.id')
                    ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                    ->where([['tipe_biaya','=','BULANAN']])->get(['biaya_siswas.id as id_biaya','biaya_siswas.*','pos_penerimaans.*','tahun_ajarans.*']);
        $nonbulanan = biaya_siswa::join('pos_penerimaans','biaya_siswas.pos_biaya','=','pos_penerimaans.id')
        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
        ->where([['tipe_biaya','=','NONBULANAN']])->get(['biaya_siswas.id as id_biaya','biaya_siswas.*','pos_penerimaans.*','tahun_ajarans.*']);
        //Data Dalam Request
        $data = "";
        $data_bulanan = "";
        $data_non_bulanan = "";
        $detail_non_bulanan = "";
        $req = $request;
        $img = "-";
        if($request->tahun_ajaran != null && $request->kode_siswa != null){
            $data = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
            ->join("kelas","aktivitas_belajars.kode_kelas",'=','kelas.kode_kelas')
            ->join("jurusans","aktivitas_belajars.kode_jurusan",'=','jurusans.kode_jurusan')
            ->where([['data_siswas.id','=',$request->kode_siswa]])
            ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','kelas.*','kelas.id as id_kelas','jurusans.*'])->first();            
            if($data){
                $img = config('app.url').'/assets/uploads/'.$data->foto_siswa;
            }
            $data_bulanan = keuangan_pembayaran_bulanan::join('biaya_siswas','keuangan_pembayaran_bulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                        ->join('kelas','keuangan_pembayaran_bulanans.kode_kelas','=','kelas.id')
                                                        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                        ->where([['kode_siswa','=',$request->kode_siswa],['tahun_ajarans.id','=',$request->tahun_ajaran]])
                                                        ->get(['keuangan_pembayaran_bulanans.id as id_bulanan','keuangan_pembayaran_bulanans.*','biaya_siswas.*','kelas.*','tahun_ajarans.*'])
                                                        ->unique('keuangan_pembayaran_bulanans.kode_biaya_siswa');
            $data_non_bulanan = keuangan_pembayaran_nonbulanan::join('biaya_siswas','keuangan_pembayaran_nonbulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                            ->join('kelas','keuangan_pembayaran_nonbulanans.kode_kelas','=','kelas.id')
                                                            ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                            ->where([['kode_siswa','=',$request->kode_siswa],['tahun_ajarans.id','=',$request->tahun_ajaran]])
                                                            ->get(['keuangan_pembayaran_nonbulanans.id as id_nonbulanan','keuangan_pembayaran_nonbulanans.*','biaya_siswas.*','kelas.*','tahun_ajarans.*']);
            $detail_non_bulanan = keuangan_detail_nonbulanan::join('keuangan_pembayaran_nonbulanans','keuangan_detail_nonbulanans.kode_non_bulanan','=','keuangan_pembayaran_nonbulanans.id')
                                                            ->join('methode_pembayarans','keuangan_detail_nonbulanans.jenis_pembayaran_detail','=','methode_pembayarans.id')
                                                            ->join('biaya_siswas','keuangan_pembayaran_nonbulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                            ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                            ->where([['keuangan_pembayaran_nonbulanans.kode_siswa','=',$request->kode_siswa],['tahun_ajarans.id','=',$request->tahun_ajaran]])
                                                            ->get(['keuangan_detail_nonbulanans.id as id_detail','keuangan_detail_nonbulanans.*','keuangan_pembayaran_nonbulanans.*','methode_pembayarans.*']);
            $nonbulanan = biaya_siswa::join('pos_penerimaans','biaya_siswas.pos_biaya','=','pos_penerimaans.id')
                                                            ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                            ->where([['tipe_biaya','=','NONBULANAN'],['tahun_ajarans.id','=',$request->tahun_ajaran]])
                                                            ->get(['biaya_siswas.id as id_biaya','biaya_siswas.*','pos_penerimaans.*','tahun_ajarans.*']);
                                                            $bulanan = biaya_siswa::join('pos_penerimaans','biaya_siswas.pos_biaya','=','pos_penerimaans.id')
                                                            ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                            ->where([['tipe_biaya','=','BULANAN'],['tahun_ajarans.id','=',$request->tahun_ajaran]])
                                                            ->get(['biaya_siswas.id as id_biaya','biaya_siswas.*','pos_penerimaans.*','tahun_ajarans.*']);
        }
        return view('pembayaran_siswa.index',compact(['tahun_ajaran','req','img','siswa','data','data_bulanan','data_non_bulanan','nonbulanan','bulanan','jenis_bayar','detail_non_bulanan']));
    }
}
