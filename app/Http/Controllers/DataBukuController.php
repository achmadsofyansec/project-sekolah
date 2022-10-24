<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Buku;
use App\Models\Sumber;
use App\Models\Kategori;

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
        $kategori = Kategori::latest()->get();
        $sumber =   Sumber::latest()->get();
        return view('master.buku.create',compact(['sumber','kategori']));
        
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
            'judul_buku' => ['required'],
            'kode_buku' => ['required'],
            'pengarang' => ['required'],
            'penerbit' => ['required'],
            'tahun_terbit' => ['required'],
            'tempat_terbit' => ['required'],
            'total_halaman' => ['required'],
            'tinggi_buku' => ['required'],
            'ddc' => ['required'],
            'isbn' => ['required'],
            'jumlah_buku' => ['required'],
            'id_sumber' => ['required'],
            'id_kategori' => ['required'],
            'tanggal_masuk' => ['required'],
            'no_inventaris' => ['required'],
            'lokasi' => ['required'],
            'deskripsi_buku' => ['required'],
            'foto_buku' => ['required'],
        ]);
        if($credential){
            $create = Buku::create([
                'judul_buku' => $request->judul_buku,
                'kode_buku' => $request->kode_buku,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'tempat_terbit' => $request->tempat_terbit,
                'total_halaman' => $request->total_halaman,
                'tinggi_buku' => $request->tinggi_buku,
                'ddc' => $request->ddc,
                'isbn' => $request->isbn,
                'jumlah_buku' => $request->jumlah_buku,
                'id_sumber' => $request->id_sumber,
                'id_kategori' => $request->id_kategori,
                'tanggal_masuk' => $request->tanggal_masuk,
                'no_inventaris' => $request->no_inventaris,
                'lokasi' => $request->lokasi,
                'deskripsi_buku' => $request->deskripsi_buku,
                'foto_buku' => $request->foto_buku,
            ]);
            if($create){
                return redirect()
                ->route('buku.index')
                ->with([
                    'success' => 'Buku Has Been Added successfully'
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
        $kategori = DB::table('perpustakaan_kategoris')->select(['perpustakaan_Kategoris.*'])->get();
        $sumber = DB::table('perpustakaan_sumbers')->select(['perpustakaan_Sumbers.*'])->get();
        $buku = Buku::findOrFail($id);
        return view('master.buku.edit',compact('buku','sumber','kategori'));
        
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
            'judul_buku' => ['required'],
            'kode_buku' => ['required'],
            'pengarang' => ['required'],
            'penerbit' => ['required'],
            'tahun_terbit' => ['required'],
            'tempat_terbit' => ['required'],
            'total_halaman' => ['required'],
            'tinggi_buku' => ['required'],
            'ddc' => ['required'],
            'isbn' => ['required'],
            'jumlah_buku' => ['required'],
            'id_sumber' => ['required'],
            'id_kategori' => ['required'],
            'tanggal_masuk' => ['required'],
            'no_inventaris' => ['required'],
            'lokasi' => ['required'],
            'deskripsi_buku' => ['required'],
            'foto_buku' => ['required'],
        ]);
        if($validate){
            $update = Buku::findOrFail($id);
            $update->update([
                'judul_buku' => $request->judul_buku,
                'kode_buku' => $request->kode_buku,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'tempat_terbit' => $request->tempat_terbit,
                'total_halaman' => $request->total_halaman,
                'tinggi_buku' => $request->tinggi_buku,
                'ddc' => $request->ddc,
                'isbn' => $request->isbn,
                'jumlah_buku' => $request->jumlah_buku,
                'id_sumber' => $request->id_sumber,
                'id_kategori' => $request->id_kategori,
                'tanggal_masuk' => $request->tanggal_masuk,
                'no_inventaris' => $request->no_inventaris,
                'lokasi' => $request->lokasi,
                'deskripsi_buku' => $request->deskripsi_buku,
                'foto_buku' => $request->foto_buku,
            ]);
            if($update){
                return redirect()
                ->route('buku.index')
                ->with([
                    'success' => 'Buku Has Been Update successfully'
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
