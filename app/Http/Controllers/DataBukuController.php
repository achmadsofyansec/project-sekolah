<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Buku;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::latest()->get();
        return view('master.buku.index',compact ('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('kategoris')->select(['Kategoris.*'])->get();
        $sumber = DB::table('sumbers')->select(['Sumbers.*'])->get();
        return view('master.buku.tambah',compact(['sumber','kategori']));
        
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
        'id_buku' => ['required'],
        'kode_buku' => ['required'],
        'total_halaman' => ['required'],
        'judul_buku' => ['required'],
        'pengarang' => ['required'],
        'penerbit' => ['required'],
        'tahun_terbit' => ['required'],
        'tempat_terbit' => ['required'],
        'tinggi_buku' => ['required'],
        'ddc' => ['required'],
        'isbn' => ['required'],
        'jumlah_buku' => ['required'],
        'tanggal_masuk' => ['required'],
        'no_inventaris' => ['required'],
        'lokasi' => ['required'],
        'deskripsi_buku' => ['required'],
        'foto_buku' => ['required'],
        'id_sumber' => ['required'],
        'id_kategori' => ['required'],
        'stok' => ['required'],
        ]);
        if($credential){
            $create = Buku::create([
        'id_buku' =>       $request->id_buku,
        'kode_buku'=>      $request->kode_buku,
        'total_halaman'=>  $request->total_halaman,
        'judul_buku'=>     $request->judul_buku,
        'pengarang'=>      $request->pengarang,
        'penerbit'=>       $request->penerbit,
        'tahun_terbit'=>   $request->tahun_terbit,
        'tempat_terbit'=>  $request->tempat_terbit,
        'tinggi_buku' =>   $request->tinggi_buku,
        'ddc'=>            $request->ddc,
        'isbn' =>          $request->isbn,
        'jumlah_buku' =>   $request->jumlah_buku,
        'tanggal_masuk' => $request->tanggal_masuk,
        'no_inventaris' => $request->no_inventaris,
        'lokasi'=>         $request->lokasi,
        'deskripsi_buku'=> $request->deskripsi_buku,
        'foto_buku'=>      $request->foto_buku,
        'id_sumber'=>      $request->id_sumber,
        'id_kategori'=>    $request->id_buku,
        'stok'=>            $request->stok,
            ]);
            if($create){
                return redirect()
                ->route('master.buku.index')
                ->with([
                    'success' => 'Kelas Has Been Added successfully'
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
        $data = Buku::findOrFail($id);
        return view('master.buku.edit',compact('data'));
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
        $credential = $this->validate($request,[
        'id_buku' => ['required'],
        'kode_buku' => ['required'],
        'total_halaman' => ['required'],
        'judul_buku' => ['required'],
        'pengarang' => ['required'],
        'penerbit' => ['required'],
        'tahun_terbit' => ['required'],
        'tempat_terbit' => ['required'],
        'tinggi_buku' => ['required'],
        'ddc' => ['required'],
        'isbn' => ['required'],
        'jumlah_buku' => ['required'],
        'tanggal_masuk' => ['required'],
        'no_inventaris' => ['required'],
        'lokasi' => ['required'],
        'deskripsi_buku' => ['required'],
        'foto_buku' => ['required'],
        'id_sumber' => ['required'],
        'id_kategori' => ['required'],
        'stok' => ['required'],
        ]);
        if($credential){
            $create = Buku::findOrFail($id);
            $create->update([
        'id_buku' =>       $request->id_buku,
        'kode_buku'=>      $request->kode_buku,
        'total_halaman'=>  $request->total_halaman,
        'judul_buku'=>     $request->judul_buku,
        'pengarang'=>      $request->pengarang,
        'penerbit'=>       $request->penerbit,
        'tahun_terbit'=>   $request->tahun_terbit,
        'tempat_terbit'=>  $request->tempat_terbit,
        'tinggi_buku' =>   $request->tinggi_buku,
        'ddc'=>            $request->ddc,
        'isbn' =>          $request->isbn,
        'jumlah_buku' =>   $request->jumlah_buku,
        'tanggal_masuk' => $request->tanggal_masuk,
        'no_inventaris' => $request->no_inventaris,
        'lokasi'=>         $request->lokasi,
        'deskripsi_buku'=> $request->deskripsi_buku,
        'foto_buku'=>      $request->foto_buku,
        'id_sumber'=>      $request->id_sumber,
        'id_kategori'=>    $request->id_buku,
        'stok'=>            $request->stok,
            ]);
            if($create){
                return redirect()
                ->route('master.buku.index')
                ->with([
                    'success' => 'Kelas Has Been Added successfully'
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
        //
        $data = Buku::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('buku.index')
            ->with([
                'success' => 'Buku Has Been Deleted successfully'
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
