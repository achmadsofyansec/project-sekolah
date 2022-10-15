<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Peminjaman_buku;
use App\Models\Pengunjung_perpus;
use App\Models\PeminjamanBukuDt;
use App\Models\Buku;

class PeminjamanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $siswa = DB::table('data_siswas')->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.nisn as id_siswa','aktivitas_belajars.*']);
        $data = DB::table('perpustakaan_peminjaman_bukus')
        ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_bukus.id_siswa')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','perpustakaan_peminjaman_bukus.*','perpustakaan_peminjaman_bukus.id as id_peminjaman','aktivitas_belajars.*']);
        

        return view('transaksi.peminjaman.index',compact (['siswa','data']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $credential = $this->validate($request,[
            'kode_siswa' => ['required'],
            'tanggungan' => ['required'],
            'desc_pinjam' => ['required'],
        ]);
        if($credential){
            $create = Peminjaman_buku::create([
                'id_siswa' => $request->kode_siswa,
                'tanggungan' => $request->tanggungan,
                'desc_pinjam' => $request->desc_pinjam,
            ]);
            if($create){
                return redirect()
                ->route('peminjaman_buku.index')
                ->with([
                    'success' => 'Pinjam Buku Has Been Added successfully'
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
                'error' => 'Some problem has occurred, please try again'
            ]);
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
         $data = DB::table('perpustakaan_peminjaman_bukus')
         ->join('data_siswas','data_siswas.nisn','=','perpustakaan_peminjaman_bukus.id_siswa')
         ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
         ->where([['perpustakaan_peminjaman_bukus.id_siswa','=',$id]])
         ->get(['data_siswas.*','data_siswas.id as id_siswa','perpustakaan_peminjaman_bukus.id as id_peminjaman','perpustakaan_peminjaman_bukus.*','aktivitas_belajars.*'])->first();
         $buku = DB::table('perpustakaan_data_bukus')->get();
         $tanggungan = DB::table('perpustakaan_peminjaman_buku_dts')->where('status', '=', '1')->where('id_siswa','=',$id)->get();
         $denda = DB::table('perpustakaan_dendas')->get();
         $pinjam = DB::table('perpustakaan_peminjaman_buku_dts')->where('id_siswa','=',$id)->get();
         return view('transaksi.peminjaman.edit',compact(['data','denda','tanggungan','pinjam','buku']));
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
        {
        
            $validate = $this->validate($request,[
                'nis_siswa' => ['required'],            
                'tanggungan' => ['required'],
                'desc_pinjam' => ['required'],
                
            ]);
            if($validate){
                $update = Peminjaman_buku::findOrFail($id);
                $update->update([
                    'id_siswa' => $request->nis_siswa,
                    'tanggungan' => $request->tanggungan,
                    'desc_pinjam' => $request->desc_pinjam,
                ]);
                if($update){
                    return redirect()
                    ->route('peminjaman_buku.index')
                    ->with([
                        'success' => 'peminjaman Has Been Update successfully'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Peminjaman_buku::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('peminjaman_buku.index')
            ->with([
                'success' => 'Transaksi Has Been Deleted successfully'
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
