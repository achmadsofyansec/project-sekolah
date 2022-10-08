<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SarprasSanitasi;
use Illuminate\Support\Facades\DB;

class SanitasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('sarpras_sanitasis')->select(['sarpras_sanitasis.*','sarpras_sanitasis.id as id_sanitasi'])->first();
        return view('asset_tetap.sanitasi.index',compact('data'));
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
        //
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
       
        $validate = $this->validate($request,[
            'sumber_air_bersih' => ['required'],
            // 'sumber_air_minum' => ['required'],
            // 'kecukupan_air_bersih' => ['required'],
            // 'fasilitas_jamban_khusus' => ['required'],
            // 'tipe_toilet' => ['required'],
            // 'pembalut_cadangan' => ['required'],
            // 'cuci_tangan' => ['required'],
            // 'jumlah_cuci_tangan_kb' => ['required'],
            // 'jumlah_cuci_tangan_kr' => ['required'],
            // 'jumlah_sabun_cuci_tangan' => ['required'],
            // 'pembuangan_limbah' => ['required'],
            // 'waktu_pembuagan_limbah' => ['required'],
            // 'selokan_air' => ['required'],
            // 'tempat_sampah_kelas' => ['required'],
            // 'tempat_sampah_tertutup' => ['required'],            
            // 'cermin' => ['required'],
            // 'tps' => ['required'],
            // 'pengangkatan_sampah' => ['required'],          
            // 'anggaran_pemeliharaan' => ['required'],
            // 'kegiatan_rutin' => ['required'],
            // 'kemitraan_sekolah' => ['required'],
            // 'pemisahan_jamban' => ['required'],
            // 'jumlah_jamban_baik_lk' => ['required'],
            // 'jumlah_jamban_baik_pr' => ['required'],
            // 'jumlah_jamban_baik_br' => ['required'],
            // 'jumlah_jamban_rusak_lk' => ['required'],
            // 'jumlah_jamban_rusak_pr' => ['required'],
            // 'jumlah_jamban_rusak_br' => ['required'],
        ]);
        if($validate){
            $update = SarprasSanitasi::findOrFail($id);
            $update->update([
                'sumber_air_bersih' => $request->sumber_air_bersih,
                // 'sumber_air_minum' => $request->sumber_air_minum,
                // 'kecukupan_air_bersih' => $request->kecukupan_air_bersih,
                // 'fasilitas_jamban_khusus' => $request->fasilitas_jamban_khusus,
                // 'tipe_toilet' => $request->tipe_toilet,
                // 'pembalut_cadangan' => $request->pembalut_cadangan,
                // 'cuci_tangan' => $request->cuci_tangan,
                // 'jumlah_cuci_tangan_kb' => $request->jumlah_cuci_tangan_kb,
                // 'jumlah_cuci_tangan_kr' => $request->jumlah_cuci_tangan_kr,
                // 'jumlah_sabun_cuci_tangan' => $request->jumlah_sabun_cuci_tangan,
                // 'pembuangan_limbah' => $request->pembuangan_limbah,
                // 'waktu_pembuagan_limbah' => $request->waktu_pembuagan_limbah,
                // 'selokan_air' => $request->selokan_air,
                // 'tempat_sampah_kelas' => $request->tempat_sampah_kelas,
                // 'tempat_sampah_tertutup' => $request->tempat_sampah_tertutup,
                // 'cermin' => $request->cermin,
                // 'tps' => $request->tps,
                // 'pengangkatan_sampah' => $request->pengangkatan_sampah,
                // 'anggaran_pemeliharaan' => $request->anggaran_pemeliharaan,
                // 'kegiatan_rutin' => $request->kegiatan_rutin,
                // 'kemitraan_sekolah' => $request->kemitraan_sekolah,
                // 'pemisahan_jamban' => $request->pemisahan_jamban,
                // 'jumlah_jamban_baik_lk' => $request->jumlah_jamban_baik_lk,
                // 'jumlah_jamban_baik_pr' => $request->jumlah_jamban_baik_pr,
                // 'jumlah_jamban_baik_br' => $request->jumlah_jamban_baik_br,
                // 'jumlah_jamban_rusak_lk' => $request->jumlah_jamban_rusak_lk,
                // 'jumlah_jamban_rusak_pr' => $request->jumlah_jamban_rusak_pr,
                // 'jumlah_jamban_rusak_br' => $request->jumlah_jamban_rusak_br,
            ]);
            $update = DB::table('sarpras_sanitasis')->where('sarpras_sanitasis.id','=',$id);
            if($update){
                return redirect()
                ->route('sanitasi.index')
                ->with([
                    'success' => 'Sanitasi Has Been Update successfully'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
