<?php

namespace App\Http\Controllers;

use App\Models\alumni_lowongan_kerja;
use Illuminate\Http\Request;

class LowonganKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni_lowongan_kerja = alumni_lowongan_kerja::latest()->get();
        return view('lowongan.index', compact('alumni_lowongan_kerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lowongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credential = $this->validate($request, [
            'judul' => ['required'],
            'isi' => ['required'],
            'file' => ['required'],
        ]);

        if ($credential) {
            $data = [];
            $tglnow = date('Y-m-d');
            $file = $request->file('file');
            if ($file != null) {
                $name = $request->file('file')->getClientOriginalName();
                $file->move('../assets/uploads', $name);
                $data = [
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'file' => $name,
                    'tanggal' => $tglnow,
                ];
            } else {
                $data = [
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'file' => '-',
                    'tanggal' => $tglnow,
                ];
            }
            $create = alumni_lowongan_kerja::create($data);

            if ($create) {
                return redirect()
                    ->route('lowongan.index')
                    ->with([
                        'success' => 'Lowongan Kerja Has Been Added successfully'
                    ]);
            } else {
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
        $alumni = alumni_lowongan_kerja::findOrFail($id);
        return view('lowongan.edit',compact('alumni'));
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
            'judul' => ['required'],
            'isi' => ['required'],
        ]);
        if($validate){
            $data = [];
            $file = $request->file('file');
            if($file != null){
                $name = $request->file('file')->getClientOriginalName();
                $file->move('../assets/uploads',$name);
                $data = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'file' => $name,
                ];
            } else {
                $data = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'file' => '-',
                ];
            }
            $update = alumni_lowongan_kerja::findOrFail($id);
            $update->update($data);
            if($update){
                return redirect()
                ->route('lowongan.index')
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
        {
            $data = alumni_lowongan_kerja::findOrFail($id);
            $data->delete();
            if($data){
                return redirect()
                ->route('lowongan.index')
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
}
