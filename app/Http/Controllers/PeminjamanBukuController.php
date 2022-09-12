<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Peminjaman_buku;

class PeminjamanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('data_siswas')->select(['data_siswas.*'])->get();
        $buku = DB::table('data_bukus')->select(['data_bukus.*'])->get();
        $peminjaman = Peminjaman_buku::latest()->get();
        $data = DB::table('data_bukus')
                    ->join('peminjaman_bukus', 'peminjaman_bukus.id_buku', '=', 'data_bukus.kode_buku')
                    ->where('status','LIKE', "1" )
                    ->get();
        return view('transaksi.peminjaman.index',compact (['siswa','buku','data']));
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
            'nis' => ['required'],
            'kode_buku' => ['required'],
            'jumlah_pinjam' => ['required'],
            'status' => ['required'],
            'durasi' => ['required']
        ]);
        if($credential){
            $create = Peminjaman_buku::create([
                'id_siswa' => $request->nis,
                'id_buku' => $request->kode_buku,
                'jumlah_pinjam' => $request->jumlah_pinjam,
                'status' => $request->status,
                'durasi' => $request->durasi
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
            'status' => ['required']
        ]);
        if($validate){
            $update = peminjaman_buku::findOrFail($id);
            $update->update([
                'status' => $request->status
            ]);
            if($update){
                return redirect()
                ->route('pengembalian.index')
                ->with([
                    'success' => 'Terima Kasih Sudah Mengembalikan'
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
