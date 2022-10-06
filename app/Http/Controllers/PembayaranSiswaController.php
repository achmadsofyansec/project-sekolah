<?php

namespace App\Http\Controllers;

use App\Models\biaya_siswa;
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
        $req = $request;
        $img = "-";
        if($request->tahun_ajaran != null && $request->kode_siswa != null){
            $data = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
            ->join("kelas","aktivitas_belajars.kode_kelas",'=','kelas.kode_kelas')
            ->join("jurusans","aktivitas_belajars.kode_jurusan",'=','jurusans.kode_jurusan')
            ->where([['data_siswas.id','=',$request->kode_siswa]])
            ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','kelas.*','kelas.id as id_kelas','jurusans.*'])->first();            
            $img = config('app.url').'/assets/uploads/'.$data->foto_siswa;
            $data_non_bulanan = keuangan_pembayaran_nonbulanan::join('biaya_siswas','keuangan_pembayaran_nonbulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                            ->join('kelas','keuangan_pembayaran_nonbulanans.kode_kelas','=','kelas.id')
                                                            ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                            ->where([['kode_siswa','=',$request->kode_siswa]])
                                                            ->get(['keuangan_pembayaran_nonbulanans.id as id_nonbulanan','keuangan_pembayaran_nonbulanans.*','biaya_siswas.*','kelas.*','tahun_ajarans.*']);

        }
        return view('pembayaran_siswa.index',compact(['tahun_ajaran','req','img','siswa','data','data_bulanan','data_non_bulanan','nonbulanan','bulanan']));
    }
    public function create_non_bulanan(Request $request){
        
        $validate = $this->validate($request,[
            'kode_siswa' =>['required'],
            'tarif_biaya' =>['required'],
            'kode_biaya_siswa' => ['required']
        ]);
        if($validate){
            $cek = keuangan_pembayaran_nonbulanan::where([['kode_siswa','=',$request->kode_siswa]
                                                ,['kode_biaya_siswa','=',$request->kode_biaya_siswa]
                                                ,['kode_kelas','=',$request->kode_kelas]
                                                ])->get()
                                                ->count();
            if($cek < 1){
                $create = keuangan_pembayaran_nonbulanan::create([
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'tagihan_pembayaran' =>$request->tarif_biaya,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ]);
                if($create){
                    return redirect()
                    ->back()
                    ->with([
                        'success' => 'Data Non Bulanan Has Been Added successfully'
                    ]);
                }else{
                    return redirect()
                    ->back()
                    ->with([
                        'error' => 'Some problem has occurred, please try again'
                    ]);
                }
            }else{
                return redirect()
                    ->back()
                    ->with([
                        'error' => 'Data Non Bulanan Already Added'
                    ]);
            }
           
        }
       

    }
}
