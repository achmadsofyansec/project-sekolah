<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use App\Models\keuangan_history;
use App\Models\keuangan_pembayaran_bulanan;
use App\Models\methode_pembayaran;
use Illuminate\Http\Request;

class BulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'kode_siswa' =>['required'],
            'kode_kelas' =>['required'],
            'kode_biaya_siswa' => ['required'],
            'tarif_bulan_juli' =>['required'],
            'tarif_bulan_agustus' =>['required'],
            'tarif_bulan_september' =>['required'],
            'tarif_bulan_oktober' =>['required'],
            'tarif_bulan_november' =>['required'],
            'tarif_bulan_desember' =>['required'],
            'tarif_bulan_januari' =>['required'],
            'tarif_bulan_februari' =>['required'],
            'tarif_bulan_maret' =>['required'],
            'tarif_bulan_april' =>['required'],
            'tarif_bulan_mei' =>['required'],
            'tarif_bulan_juni' =>['required'],
        ]);
        if($validate){
            $cek = keuangan_pembayaran_bulanan::where([['kode_siswa','=',$request->kode_siswa]
                                                ,['kode_biaya_siswa','=',$request->kode_biaya_siswa]
                                                ,['kode_kelas','=',$request->kode_kelas]
                                                ])->get()
                                                ->count();
            if($cek < 1){
                $data1 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'Juli',
                    'tagihan_pembayaran' =>$request->tarif_bulan_juli,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data2 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'Agustus',
                    'tagihan_pembayaran' =>$request->tarif_bulan_agustus,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data3 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'September',
                    'tagihan_pembayaran' =>$request->tarif_bulan_september,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data4 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'Oktober',
                    'tagihan_pembayaran' =>$request->tarif_bulan_oktober,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data5 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'November',
                    'tagihan_pembayaran' =>$request->tarif_bulan_november,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data6 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'Desember',
                    'tagihan_pembayaran' =>$request->tarif_bulan_desember,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data7 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'Januari',
                    'tagihan_pembayaran' =>$request->tarif_bulan_januari,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data8 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'Februari',
                    'tagihan_pembayaran' =>$request->tarif_bulan_februari,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data9 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'Maret',
                    'tagihan_pembayaran' =>$request->tarif_bulan_maret,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data10 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'April',
                    'tagihan_pembayaran' =>$request->tarif_bulan_april,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data11 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'Mei',
                    'tagihan_pembayaran' =>$request->tarif_bulan_mei,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $data12 =  [
                    'kode_siswa' =>$request->kode_siswa,
                    'kode_kelas' =>$request->kode_kelas,
                    'kode_biaya_siswa' =>$request->kode_biaya_siswa,
                    'bulan_pembayaran' => 'Juni',
                    'tagihan_pembayaran' =>$request->tarif_bulan_juni,
                    'nominal_pembayaran' =>'0',
                    'tgl_bayar' =>'-',
                    'status_pembayaran' =>'0',
                    'ket_pembayaran' =>$request->ket_biaya,
                ];
                $create = keuangan_pembayaran_bulanan::create($data1);
                $create = keuangan_pembayaran_bulanan::create($data2);
                $create = keuangan_pembayaran_bulanan::create($data3);
                $create = keuangan_pembayaran_bulanan::create($data4);
                $create = keuangan_pembayaran_bulanan::create($data5);
                $create = keuangan_pembayaran_bulanan::create($data6);
                $create = keuangan_pembayaran_bulanan::create($data7);
                $create = keuangan_pembayaran_bulanan::create($data8);
                $create = keuangan_pembayaran_bulanan::create($data9);
                $create = keuangan_pembayaran_bulanan::create($data10);
                $create = keuangan_pembayaran_bulanan::create($data11);
                $create = keuangan_pembayaran_bulanan::create($data12);
                if($create){
                    return redirect()
                    ->back()
                    ->with([
                        'success' => 'Data Bulanan Has Been Added successfully'
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
                        'error' => 'Data Bulanan Already Added'
                    ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bulanan = keuangan_pembayaran_bulanan::findOrFail($id);
        $jenis_bayar = methode_pembayaran::latest()->get();
        $data = "";
        $img = "";
        $detail_bulanan = "";
        $data_bulanan = "";
        if($bulanan){
            $data = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
            ->join("kelas","aktivitas_belajars.kode_kelas",'=','kelas.kode_kelas')
            ->join("jurusans","aktivitas_belajars.kode_jurusan",'=','jurusans.kode_jurusan')
            ->where([['data_siswas.id','=',$bulanan->kode_siswa]])
            ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*','kelas.*','kelas.id as id_kelas','jurusans.*'])->first();            
            if($data){
                $img = config('app.url').'/assets/uploads/'.$data->foto_siswa;
            }
            $data_bulanan = keuangan_pembayaran_bulanan::groupBy('keuangan_pembayaran_bulanans.kode_biaya_siswa')
            ->join('biaya_siswas','keuangan_pembayaran_bulanans.kode_biaya_siswa','=','biaya_siswas.id')
            ->join('kelas','keuangan_pembayaran_bulanans.kode_kelas','=','kelas.id')
            ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
            ->where([['keuangan_pembayaran_bulanans.id','=',$id]])
            ->get(['keuangan_pembayaran_bulanans.id as id_bulanan','keuangan_pembayaran_bulanans.*','biaya_siswas.id as id_biayas','biaya_siswas.*','kelas.*','tahun_ajarans.*','tahun_ajarans.id as id_tahun_ajaran'])->first();
            $detail_bulanan = keuangan_pembayaran_bulanan::join('biaya_siswas','keuangan_pembayaran_bulanans.kode_biaya_siswa','=','biaya_siswas.id')
                                                        ->join('kelas','keuangan_pembayaran_bulanans.kode_kelas','=','kelas.id')
                                                        ->join('tahun_ajarans','biaya_siswas.tahun_ajaran_biaya','=','tahun_ajarans.id')
                                                        ->where([['kode_siswa','=',$bulanan->kode_siswa],['kode_biaya_siswa','=',$bulanan->kode_biaya_siswa]])
                                                        ->get(['keuangan_pembayaran_bulanans.id as id_bulanan','keuangan_pembayaran_bulanans.*','biaya_siswas.*','kelas.*','tahun_ajarans.*']);
        }
        return view('pembayaran_siswa.page.bayar_bulanan',compact(['data','data_bulanan','img','detail_bulanan','jenis_bayar'])); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request,[
            'tgl_input_detail' => ['required'],
            'jenis_pembayaran_detail' => ['required'],
            'nominal_detail' => ['required'],
        ]);
        if($validate){
            $update  = keuangan_pembayaran_bulanan::findOrFail($id);
            if($request->nominal_detail >= $update->tagihan_pembayaran){
                $update->update([
                    'kode_jenis_pembayaran' => $request->jenis_pembayaran_detail,
                    'nominal_pembayaran' => $request->nominal_detail,
                    'tgl_bayar' => $request->tgl_input_detail,
                    'status_pembayaran' => '1',
                ]);
                if($update){
                    keuangan_history::create([
                        'tgl_history' =>  $request->tgl_input_detail,
                        'histori_type_pembayaran' => 'bulanan',
                        'kode_biaya' => $request->kode_biaya,
                        'history_tagihan' => $update->tagihan_pembayaran,
                        'history_pembayaran' => $request->nominal_detail,
                        'kode_siswa' => $request->kode_siswa,
                    ]);
                    return redirect()
                    ->back()
                    ->with([
                        'success' => 'Data Bulanan Has Been Paid successfully'
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
                    'error' => 'Data Bulanan Has Been Paid unsuccessfully, Money Not Enough'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = keuangan_pembayaran_bulanan::findOrFail($id);
        if($data){
            $datas = keuangan_pembayaran_bulanan::where([['kode_biaya_siswa','=',$data->kode_biaya_siswa],['kode_siswa','=',$data->kode_siswa]])->delete();
            if($datas){
                return redirect()
                ->back()
                ->with([
                    'success' => 'Biaya Bulanan Has Been Deleted successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
            
        }
    }
}
