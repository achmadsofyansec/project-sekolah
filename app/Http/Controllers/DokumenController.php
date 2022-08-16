<?php

namespace App\Http\Controllers;


use App\Models\Dokumen;
use App\Models\ArsipRuangan;
use App\Models\ArsipLemari;
use App\Models\ArsipRak;
use App\Models\ArsipBox;
use App\Models\ArsipMap;
use App\Models\ArsipDataUrut;
use App\Models\ArsipJenisDokumen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokumen = Dokumen::latest()->get();
        return view('dokumen.input.index',compact('dokumen'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
      * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $dokumen = Dokumen::latest()->get();
        $ruangan = ArsipRuangan::latest()->get();
        $lemari = ArsipLemari::latest()->get();
        $rak = ArsipRak::latest()->get();
        $box = ArsipBox::latest()->get();
        $map = ArsipMap::latest()->get();
        $jenis_dokumen = ArsipJenisDokumen::latest()->get();
        $urut = ArsipDataUrut::latest()->get();
        return view('dokumen.input.create',compact(['dokumen', 'ruangan', 'lemari', 'rak', 'box', 'map', 'jenis_dokumen', 'urut']));
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
            'nama_ruangan' => ['required'],
            'nama_lemari' => ['required'],
            'nama_rak' => ['required'],
            'nama_box' => ['required'],
            'nama_map' => ['required'],
            'nama_urut' => ['required'],
            'tanggal_dokumen' => ['required'],
            'nama_jenis_dokumen' => ['required'],
            'nomor_dokumen' => ['required'],
            'nama_dokumen' => ['required'],
            'deskripsi' => ['required'],
            'tahun_ajaran' => ['required'],

        ]);

        if($credential){
            $data = [];
            $file = $request->file('file');
            if($file != null){
                $name = $request->file('file')->getClientOriginalName();
                $file->move('../assets/upload',$name);
                $data = [
                'nama_ruangan' => $request->nama_ruangan,
                'nama_lemari' => $request->nama_lemari,
                'nama_rak' => $request->nama_rak,
                'box' => $request->nama_box,
                'map' => $request->nama_map,
                'urut' => $request->nama_urut,
                'tanggal_dokumen' => $request->tanggal_dokumen,
                'nama_jenis_dokumen' => $request->nama_jenis_dokumen,
                'nomor_dokumen' => $request->nomor_dokumen,
                'nama_dokumen' => $request->nama_dokumen,
                'deskripsi' => $request->deskripsi,
                'file' => $name,
                'tahun_ajaran' => $request->tahun_ajaran,
                ];
            } else {
                $data = [
                'nama_ruangan' => $request->nama_ruangan,
                'nama_lemari' => $request->nama_lemari,
                'nama_rak' => $request->nama_rak,
                'nama_box' => $request->nama_box,
                'nama_map' => $request->nama_map,
                'nama_urut' => $request->nama_urut,
                'tanggal_dokumen' => $request->tanggal_dokumen,
                'nama_jenis_dokumen' => $request->nama_jenis_dokumen,
                'nomor_dokumen' => $request->nomor_dokumen,
                'nama_dokumen' => $request->nama_dokumen,
                'deskripsi' => $request->deskripsi,
                'tahun_ajaran' => $request->tahun_ajaran,
                'file' => '-',

                ];
            }
            $create = Dokumen::create($data);

            if($create){
                return redirect()
                ->route('input_dokumen.index')
                ->with([
                    'success' => 'Dokumen Has Been Added successfully'
                ]);
            }else{
                return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
        } else {
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

        $dokumen = Dokumen::findOrFail($id);
        $ruangan = ArsipRuangan::latest()->get();
        $lemari = ArsipLemari::latest()->get();
        $rak = ArsipRak::latest()->get();
        $box = ArsipBox::latest()->get();
        $map = ArsipMap::latest()->get();
        $jenis_dokumen = ArsipJenisDokumen::latest()->get();
        $urut = ArsipDataUrut::latest()->get();
        return view('dokumen.input.edit',compact(['dokumen', 'ruangan', 'lemari', 'rak', 'box', 'map', 'jenis_dokumen', 'urut']));

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
            'nama_ruangan' => ['required'],
            'nama_lemari' => ['required'],
            'nama_rak' => ['required'],
            'nama_box' => ['required'],
            'nama_map' => ['required'],
            'nama_urut' => ['required'],
            'tanggal_dokumen' => ['required'],
            'nama_jenis_dokumen' => ['required'],
            'nomor_dokumen' => ['required'],
            'nama_dokumen' => ['required'],
            'deskripsi' => ['required'],
            'tahun_ajaran' => ['required'],

        ]);
        if($validate){
            $data = [];
            $file = $request->file('file');
            if($file != null){
                $name = $request->file('file')->getClientOriginalName();
                $file->move('../assets/upload',$name);
                $data = [
                'nama_ruangan' => $request->nama_ruangan,
                'nama_lemari' => $request->nama_lemari,
                'nama_rak' => $request->nama_rak,
                'box' => $request->nama_box,
                'map' => $request->nama_map,
                'urut' => $request->nama_urut,
                'tanggal_dokumen' => $request->tanggal_dokumen,
                'nama_jenis_dokumen' => $request->nama_jenis_dokumen,
                'nomor_dokumen' => $request->nomor_dokumen,
                'nama_dokumen' => $request->nama_dokumen,
                'deskripsi' => $request->deskripsi,
                'file' => $name,
                'tahun_ajaran' => $request->tahun_ajaran,
                ];
            } else {
                $data = [
                'nama_ruangan' => $request->nama_ruangan,
                'nama_lemari' => $request->nama_lemari,
                'nama_rak' => $request->nama_rak,
                'nama_box' => $request->nama_box,
                'nama_map' => $request->nama_map,
                'nama_urut' => $request->nama_urut,
                'tanggal_dokumen' => $request->tanggal_dokumen,
                'nama_jenis_dokumen' => $request->nama_jenis_dokumen,
                'nomor_dokumen' => $request->nomor_dokumen,
                'nama_dokumen' => $request->nama_dokumen,
                'deskripsi' => $request->deskripsi,
                'tahun_ajaran' => $request->tahun_ajaran,
                'file' => '-',

                ];
            }
            $update = Dokumen::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('input_dokumen.index')
                ->with([
                    'success' => 'Jenis Dokumen Has Been Update successfully'
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
        $data = Dokumen::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('input_dokumen.index')
            ->with([
                'success' => 'Jenis Dokumen Has Been Deleted successfully'
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
