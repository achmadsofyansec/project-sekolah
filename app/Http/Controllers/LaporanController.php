<?php

namespace App\Http\Controllers;

use App\Models\keuangan_detail_nonbulanan;
use App\Models\keuangan_pembayaran_bulanan;
use App\Models\keuangan_penerimaan_lain;
use App\Models\keuangan_penerimaan_lain_detail;
use App\Models\keuangan_pengeluaran;
use App\Models\keuangan_pengeluaran_detail;
use App\Models\keuangan_tabungan_siswa_detail;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function view_harian(Request $request){

        $bulanan = "";
        $non_bulanan = "";
        $tabungan = "";
        $penerimaan_lain = "";
        $pengeluaran = "";
        $req = $request;
           if($request->filter_awal != null || $request->filter_akhir != null){
                $bulanan = keuangan_pembayaran_bulanan::join('biaya_siswas','keuangan_pembayaran_bulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                        ->join('data_siswas','keuangan_pembayaran_bulanans.kode_siswa','=','data_siswas.id')
                                                        ->join('kelas','keuangan_pembayaran_bulanans.kode_kelas','=','kelas.id')
                                                        ->join('methode_pembayarans','keuangan_pembayaran_bulanans.kode_jenis_pembayaran','=','methode_pembayarans.id')
                                                        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                        ->where([['tgl_bayar','>=',$request->filter_awal],['tgl_bayar','<=',$request->filter_akhir]])
                                                        ->get(['keuangan_pembayaran_bulanans.id as id_bulanan','keuangan_pembayaran_bulanans.*','biaya_siswas.*','kelas.*','tahun_ajarans.*','data_siswas.*','methode_pembayarans.*']);
                $non_bulanan = keuangan_detail_nonbulanan::join('keuangan_pembayaran_nonbulanans','keuangan_detail_nonbulanans.kode_non_bulanan','=','keuangan_pembayaran_nonbulanans.id')
                                                        ->join('data_siswas','keuangan_pembayaran_nonbulanans.kode_siswa','=','data_siswas.id')
                                                        ->join('kelas','keuangan_pembayaran_nonbulanans.kode_kelas','=','kelas.id')
                                                        ->join('methode_pembayarans','keuangan_detail_nonbulanans.jenis_pembayaran_detail','=','methode_pembayarans.id')
                                                        ->join('biaya_siswas','keuangan_pembayaran_nonbulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                        ->where([['tgl_input_detail','>=',$request->filter_awal],['tgl_input_detail','<=',$request->filter_akhir]])
                                                        ->get(['kelas.*','kelas.kode_kelas as code_kelas','keuangan_detail_nonbulanans.id as id_detail','keuangan_detail_nonbulanans.*','keuangan_pembayaran_nonbulanans.*','methode_pembayarans.*','biaya_siswas.*','data_siswas.*']);
                $tabungan = keuangan_tabungan_siswa_detail::join('keuangan_tabungan_siswas','keuangan_tabungan_siswa_details.kode_tabungan','=','keuangan_tabungan_siswas.id')
                                                        ->join('data_siswas','keuangan_tabungan_siswas.kode_siswa','=','data_siswas.id')
                                                        ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
                                                        ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
                                                        ->where([['keuangan_tabungan_siswa_details.created_at','>=',$request->filter_awal." 00:00:00"],['keuangan_tabungan_siswa_details.created_at','<=',$request->filter_akhir." 00:00:00"]])
                                                        ->get(['keuangan_tabungan_siswa_details.*','keuangan_tabungan_siswa_details.id as id_tabungan','keuangan_tabungan_siswas.*','data_siswas.*','kelas.*','keuangan_tabungan_siswa_details.created_at as tgl_bayar']);
                $penerimaan_lain = keuangan_penerimaan_lain_detail::join('keuangan_penerimaan_lains','keuangan_penerimaan_lain_details.kode_penerimaan','=','keuangan_penerimaan_lains.id')
                                                                    ->join('methode_pembayarans','keuangan_penerimaan_lains.methode_bayar','=','methode_pembayarans.kode_methode')
                                                                    ->where([['keuangan_penerimaan_lains.tgl_penerimaan','>=',$request->filter_awal],['keuangan_penerimaan_lains.tgl_penerimaan','<=',$request->filter_akhir]])                                                        
                                                                    ->get(['keuangan_penerimaan_lain_details.id as id_penerimaan','keuangan_penerimaan_lain_details.*','keuangan_penerimaan_lains.*','methode_pembayarans.*']);
                $pengeluaran = keuangan_pengeluaran_detail::join('keuangan_pengeluarans','keuangan_pengeluaran_details.kode_pengeluaran','=','keuangan_pengeluarans.id')
                                                          ->join('methode_pembayarans','keuangan_pengeluarans.methode_bayar','=','methode_pembayarans.kode_methode')
                                                          ->join('pos_penerimaans','keuangan_pengeluaran_details.pos_sumber','=','pos_penerimaans.kode_pos')
                                                          ->join('pos_pengeluarans','keuangan_pengeluaran_details.pos_keluar','=','pos_pengeluarans.kode_pos')
                                                          ->where([['keuangan_pengeluarans.tgl_pengeluaran','>=',$request->filter_awal],['keuangan_pengeluarans.tgl_pengeluaran','<=',$request->filter_akhir]])
                                                          ->get(['pos_penerimaans.nama_pos as sumber_dana','keuangan_pengeluaran_details.id as id_pengeluaran','keuangan_pengeluaran_details.*','keuangan_pengeluarans.*','methode_pembayarans.*','pos_penerimaans.*','pos_pengeluarans.*']);
            }
        return view('laporan.harian.index',compact(['req','bulanan','non_bulanan','tabungan','penerimaan_lain','pengeluaran']));
    }
    public function view_laporan_tahunan(Request $request){
        $bulanan = "";
        $non_bulanan = "";
        $tabungan = "";
        $penerimaan_lain = "";
        $pengeluaran = "";
        $req = $request;
           if($request->filter_awal != null || $request->filter_akhir != null){
                $bulanan = keuangan_pembayaran_bulanan::join('biaya_siswas','keuangan_pembayaran_bulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                        ->join('data_siswas','keuangan_pembayaran_bulanans.kode_siswa','=','data_siswas.id')
                                                        ->join('kelas','keuangan_pembayaran_bulanans.kode_kelas','=','kelas.id')
                                                        ->join('methode_pembayarans','keuangan_pembayaran_bulanans.kode_jenis_pembayaran','=','methode_pembayarans.id')
                                                        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                        ->where([['tgl_bayar','>=',$request->filter_awal."-01-01"],['tgl_bayar','<=',$request->filter_akhir."-12-".date('t')]])
                                                        ->get(['keuangan_pembayaran_bulanans.id as id_bulanan','keuangan_pembayaran_bulanans.*','biaya_siswas.*','kelas.*','tahun_ajarans.*','data_siswas.*','methode_pembayarans.*']);
                $non_bulanan = keuangan_detail_nonbulanan::join('keuangan_pembayaran_nonbulanans','keuangan_detail_nonbulanans.kode_non_bulanan','=','keuangan_pembayaran_nonbulanans.id')
                                                        ->join('data_siswas','keuangan_pembayaran_nonbulanans.kode_siswa','=','data_siswas.id')
                                                        ->join('kelas','keuangan_pembayaran_nonbulanans.kode_kelas','=','kelas.id')
                                                        ->join('methode_pembayarans','keuangan_detail_nonbulanans.jenis_pembayaran_detail','=','methode_pembayarans.id')
                                                        ->join('biaya_siswas','keuangan_pembayaran_nonbulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                        ->where([['tgl_input_detail','>=',$request->filter_awal."-01-01"],['tgl_input_detail','<=',$request->filter_akhir."-12-".date('t')]])
                                                        ->get(['kelas.*','kelas.kode_kelas as code_kelas','keuangan_detail_nonbulanans.id as id_detail','keuangan_detail_nonbulanans.*','keuangan_pembayaran_nonbulanans.*','methode_pembayarans.*','biaya_siswas.*','data_siswas.*']);
                $tabungan = keuangan_tabungan_siswa_detail::join('keuangan_tabungan_siswas','keuangan_tabungan_siswa_details.kode_tabungan','=','keuangan_tabungan_siswas.id')
                                                        ->join('data_siswas','keuangan_tabungan_siswas.kode_siswa','=','data_siswas.id')
                                                        ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
                                                        ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
                                                        ->where([['keuangan_tabungan_siswa_details.created_at','>=',$request->filter_awal."-01-01"." 00:00:00"],['keuangan_tabungan_siswa_details.created_at','<=',$request->filter_akhir."-12-".date('t')." 00:00:00"]])
                                                        ->get(['keuangan_tabungan_siswa_details.*','keuangan_tabungan_siswa_details.id as id_tabungan','keuangan_tabungan_siswas.*','data_siswas.*','kelas.*','keuangan_tabungan_siswa_details.created_at as tgl_bayar']);
                $penerimaan_lain = keuangan_penerimaan_lain_detail::join('keuangan_penerimaan_lains','keuangan_penerimaan_lain_details.kode_penerimaan','=','keuangan_penerimaan_lains.id')
                                                                    ->join('methode_pembayarans','keuangan_penerimaan_lains.methode_bayar','=','methode_pembayarans.kode_methode')
                                                                    ->where([['keuangan_penerimaan_lains.tgl_penerimaan','>=',$request->filter_awal."-01-01"],['keuangan_penerimaan_lains.tgl_penerimaan','<=',$request->filter_akhir."-12-".date('t')]])                                                        
                                                                    ->get(['keuangan_penerimaan_lain_details.id as id_penerimaan','keuangan_penerimaan_lain_details.*','keuangan_penerimaan_lains.*','methode_pembayarans.*']);
                $pengeluaran = keuangan_pengeluaran_detail::join('keuangan_pengeluarans','keuangan_pengeluaran_details.kode_pengeluaran','=','keuangan_pengeluarans.id')
                                                                    ->join('methode_pembayarans','keuangan_pengeluarans.methode_bayar','=','methode_pembayarans.kode_methode')
                                                                    ->join('pos_penerimaans','keuangan_pengeluaran_details.pos_sumber','=','pos_penerimaans.kode_pos')
                                                                    ->join('pos_pengeluarans','keuangan_pengeluaran_details.pos_keluar','=','pos_pengeluarans.kode_pos')
                                                                    ->where([['keuangan_pengeluarans.tgl_pengeluaran','>=',$request->filter_awal."-01-01"],['keuangan_pengeluarans.tgl_pengeluaran','<=',$request->filter_akhir."-12-".date('t')]])
                                                                    ->get(['pos_penerimaans.nama_pos as sumber_dana','keuangan_pengeluaran_details.id as id_pengeluaran','keuangan_pengeluaran_details.*','keuangan_pengeluarans.*','methode_pembayarans.*','pos_penerimaans.*','pos_pengeluarans.*']);
                
            }
        return view('laporan.tahunan.index',compact(['req','bulanan','tabungan','non_bulanan','penerimaan_lain','pengeluaran']));
    }
    public function view_laporan_bulanan(Request $request){
        $bulanan = "";
        $non_bulanan = "";
        $tabungan = "";
        $penerimaan_lain = "";
        $pengeluaran = "";
        $req = $request;
           if($request->filter_awal != null || $request->filter_akhir != null){
                $bulanan = keuangan_pembayaran_bulanan::join('biaya_siswas','keuangan_pembayaran_bulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                        ->join('data_siswas','keuangan_pembayaran_bulanans.kode_siswa','=','data_siswas.id')
                                                        ->join('kelas','keuangan_pembayaran_bulanans.kode_kelas','=','kelas.id')
                                                        ->join('methode_pembayarans','keuangan_pembayaran_bulanans.kode_jenis_pembayaran','=','methode_pembayarans.id')
                                                        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                        ->where([['tgl_bayar','>=',$request->filter_awal."-01"],['tgl_bayar','<=',$request->filter_akhir."-".date('t')]])
                                                        ->get(['keuangan_pembayaran_bulanans.id as id_bulanan','keuangan_pembayaran_bulanans.*','biaya_siswas.*','kelas.*','tahun_ajarans.*','data_siswas.*','methode_pembayarans.*']);
                $non_bulanan = keuangan_detail_nonbulanan::join('keuangan_pembayaran_nonbulanans','keuangan_detail_nonbulanans.kode_non_bulanan','=','keuangan_pembayaran_nonbulanans.id')
                                                        ->join('data_siswas','keuangan_pembayaran_nonbulanans.kode_siswa','=','data_siswas.id')
                                                        ->join('kelas','keuangan_pembayaran_nonbulanans.kode_kelas','=','kelas.id')
                                                        ->join('methode_pembayarans','keuangan_detail_nonbulanans.jenis_pembayaran_detail','=','methode_pembayarans.id')
                                                        ->join('biaya_siswas','keuangan_pembayaran_nonbulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                        ->where([['tgl_input_detail','>=',$request->filter_awal."-01"],['tgl_input_detail','<=',$request->filter_akhir."-".date('t')]])
                                                        ->get(['kelas.*','kelas.kode_kelas as code_kelas','keuangan_detail_nonbulanans.id as id_detail','keuangan_detail_nonbulanans.*','keuangan_pembayaran_nonbulanans.*','methode_pembayarans.*','biaya_siswas.*','data_siswas.*']);
                $tabungan = keuangan_tabungan_siswa_detail::join('keuangan_tabungan_siswas','keuangan_tabungan_siswa_details.kode_tabungan','=','keuangan_tabungan_siswas.id')
                                                        ->join('data_siswas','keuangan_tabungan_siswas.kode_siswa','=','data_siswas.id')
                                                        ->join('aktivitas_belajars','data_siswas.nik','=','aktivitas_belajars.kode_siswa')
                                                        ->join('kelas','aktivitas_belajars.kode_kelas','=','kelas.kode_kelas')
                                                        ->where([['keuangan_tabungan_siswa_details.created_at','>=',$request->filter_awal."-01"." 00:00:00"],['keuangan_tabungan_siswa_details.created_at','<=',$request->filter_akhir."-".date('t')." 00:00:00"]])
                                                        ->get(['keuangan_tabungan_siswa_details.*','keuangan_tabungan_siswa_details.id as id_tabungan','keuangan_tabungan_siswas.*','data_siswas.*','kelas.*','keuangan_tabungan_siswa_details.created_at as tgl_bayar']);
                $penerimaan_lain = keuangan_penerimaan_lain_detail::join('keuangan_penerimaan_lains','keuangan_penerimaan_lain_details.kode_penerimaan','=','keuangan_penerimaan_lains.id')
                                                                    ->join('methode_pembayarans','keuangan_penerimaan_lains.methode_bayar','=','methode_pembayarans.kode_methode')
                                                                    ->where([['keuangan_penerimaan_lains.tgl_penerimaan','>=',$request->filter_awal."-01"],['keuangan_penerimaan_lains.tgl_penerimaan','<=',$request->filter_akhir."-".date('t')]])                                                        
                                                                    ->get(['keuangan_penerimaan_lain_details.id as id_penerimaan','keuangan_penerimaan_lain_details.*','keuangan_penerimaan_lains.*','methode_pembayarans.*']);
                $pengeluaran = keuangan_pengeluaran_detail::join('keuangan_pengeluarans','keuangan_pengeluaran_details.kode_pengeluaran','=','keuangan_pengeluarans.id')
                                                                    ->join('methode_pembayarans','keuangan_pengeluarans.methode_bayar','=','methode_pembayarans.kode_methode')
                                                                    ->join('pos_penerimaans','keuangan_pengeluaran_details.pos_sumber','=','pos_penerimaans.kode_pos')
                                                                    ->join('pos_pengeluarans','keuangan_pengeluaran_details.pos_keluar','=','pos_pengeluarans.kode_pos')
                                                                    ->where([['keuangan_pengeluarans.tgl_pengeluaran','>=',$request->filter_awal."-01"],['keuangan_pengeluarans.tgl_pengeluaran','<=',$request->filter_akhir."-".date('t')]])
                                                                    ->get(['pos_penerimaans.nama_pos as sumber_dana','keuangan_pengeluaran_details.id as id_pengeluaran','keuangan_pengeluaran_details.*','keuangan_pengeluarans.*','methode_pembayarans.*','pos_penerimaans.*','pos_pengeluarans.*']);
            }
        return view('laporan.bulanan.index',compact(['bulanan','non_bulanan','tabungan','penerimaan_lain','pengeluaran','req']));
    }
}
