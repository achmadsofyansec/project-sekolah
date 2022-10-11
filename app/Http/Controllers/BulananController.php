<?php

namespace App\Http\Controllers;

use App\Models\keuangan_pembayaran_bulanan;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $datas = keuangan_pembayaran_bulanan::where([['kode_biaya_siswa','=',$data->kode_biaya_siswa]])->delete();
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
