<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SarprasDataAset;
use App\Models\data_siswa;
use App\Models\SarprasKategoriAset;
use App\Models\SarprasPeminjamanDetail;
use App\Models\SarprasPeminjamans;
use Illuminate\Support\Str;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = data_siswa::join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*']);
        $kategori = SarprasDataAset::latest()->get();
        $data = SarprasPeminjamans::join('data_siswas','sarpras_peminjamans.kode_siswa','=','data_siswas.id')
                                        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
                                        ->where([['data_siswas.status_siswa','=','Aktif']])
                                        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
                                            ,'sarpras_peminjamans.kode_peminjaman as kode_peminjaman'
                                            ,'sarpras_peminjamans.*','sarpras_peminjamans.id as id_peminjaman']);
        
        $detail = SarprasPeminjamanDetail::join('data_siswas', 'data_siswas.id', '=', 'sarpras_peminjaman_details.kode.siswa')
                                            ->join('sarpras_peminjamans', 'sarpras_peminjamans.kode_peminjaman', '=', 'sarpras_peminjaman_details.kode_siswa');
        return view('peminjaman.index',compact(['data','siswa', 'kategori', 'detail']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjaman.peminjaman_detail');
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
            'kode_siswa' => ['required'],
            'status_peminjaman' => ['required'],
            'desc_peminjaman' => ['required'],
            'tgl_peminjaman' => ['required'],
            'tgl_pengembalian' => ['required'],
            'penerima' => ['required'],
        ]);
        if($validate){
            $cek = SarprasPeminjamans::where([['kode_siswa','=',$request->kode_siswa]])->get()->first();
            if(!$cek){
                $qode = Str::random(6);
                $length = SarprasPeminjamans::latest()->get()->count();
                $kode = 'PMJ_'.$qode.$length;
                $create= SarprasPeminjamans::create([
                    'kode_peminjaman' => $kode,
                    'kode_siswa' => $request->kode_siswa,
                    'status_peminjaman' => $request->status_peminjaman,
                    'desc_peminjaman' => $request->desc_peminjaman,
                    'tgl_peminjaman' => $request->tgl_peminjaman,
                    'tgl_pengembalian' => $request->tgl_pengembalian,
                    'penerima' => $request->penerima,
                ]);
                if($create){
                    return redirect()
                    ->route('peminjaman.index')
                    ->with([
                        'success' => 'Peminjman Has Been Added successfully'
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
                    ->route('peminjaman.index')
                    ->with([
                        'success' => 'Peminjaman Has Been Already Added'
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

    public function createdetail()
    {
        // $data = SarprasPeminjamanDetail::latest()->get();
        $kategori = SarprasKategoriAset::latest()->get();
        $data = SarprasPeminjamanDetail::join('sarpras_peminjamans.kode_peminjaman', '=', 'sarpras_peminjaman_details.kode_peminjaman')->get();
        return view('peminjaman.peminjaman_detail', compact(['data', 'kategori']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDetail(Request $request)
    {
        $credential = $this->validate($request,[
            'kode_peminjaman' => ['required'],
            'unit' => ['required'],
            'jumlah' => ['required'],
            'penerima' => ['required'],
        ]);
        if($credential){
            $create = SarprasPeminjamanDetail::create([
                'kode_peminjaman' => $request->kode_peminjaman,
                'unit' => $request->unit,
                'jumlah' => $request->jumlah,
                'penerima' => $request->penerima,
            ]);
            if($create){
                return redirect()
                ->route('peminjaman.edit')
                ->with([
                    'success' => 'Data Peminjaman Has Been Added successfully'
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
        $data = SarprasPeminjamans::join('data_siswas','sarpras_peminjamans.kode_siswa','=','data_siswas.id')
        ->join("aktivitas_belajars","data_siswas.nik",'=','aktivitas_belajars.kode_siswa')
        ->where([['sarpras_peminjamans.id','=',$id]])
        ->get(['data_siswas.*','data_siswas.id as id_siswa','aktivitas_belajars.*'
            ,'sarpras_peminjamans.kode_peminjaman as kode_peminjaman'
            ,'sarpras_peminjamans.*','sarpras_peminjamans.id as id_peminjaman'])->first();
        $kategori = SarprasDataAset::latest()->get();
        $detail = SarprasPeminjamanDetail::join('data_siswas', 'sarpras_peminjaman_details.kode_siswa', '=', 'data_siswas.id')
                                            ->join('sarpras_peminjamans', 'sarpras_peminjaman_details.kode_peminjaman', '=', 'sarpras_peminjamans.kode_peminjaman')
                                            ->where([['sarpras_peminjamans.id','=',$id]])
                                            ->get();
       // $detail = SarprasPeminjamanDetail::join('sarpras_peminjamans', 'sarpras_peminjaman_details.kode_peminjaman', '=', 'sarpras_peminjamans.kode_peminjaman')->get();
        return view('peminjaman.edit',compact(['data', 'kategori', 'detail']));
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
            'desc_peminjaman' => ['required'],
            'tgl_peminjaman' => ['required'],
            'tgl_pengembalian' => ['required'],
            'status_peminjaman' => ['required'],
            'penerima' => ['required'],
        ]);
        
        if($validate){
            $update = SarprasPeminjamans::findOrFail($id);
            $update->update([
                'desc_peminjaman' => $request->desc_peminjaman,
                'tgl_peminjaman' => $request->tgl_peminjaman,
                'tgl_pengembalian' => $request->tgl_pengembalian,
                'status_peminjaman' => $request->status_peminjaman,
                'penerima' => $request->penerima,
            ]);
            if($update){
                return redirect()
                ->route('peminjaman.index')
                ->with([
                    'success' => 'Peminjaman Has Been Update successfully'
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
        $data = SarprasPeminjamans::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('peminjaman.index')
            ->with([
                'success' => 'peminjaman Has Been Deleted successfully'
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
