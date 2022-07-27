<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ekstra = Ekstrakulikuler::latest()->get();
        return view('ekstrakulikuler.index',compact('ekstra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ekstrakulikuler.create');
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
        $validate = $this->validate($request,[
            'kode_ekstra' => ['required'],
            'nama_ekstra' => ['required'],
            'status_ekstra' => ['required'],
            'wajib_ekstra' => ['required'],
        ]);
        if($validate){
            $create = Ekstrakulikuler::create([
                'kode_ekstra' => $request->kode_ekstra,
                'nama_ekstra' => $request->nama_ekstra,
                'desc_ekstra' => $request->desc_ekstra,
                'status_ekstra' => $request->status_ekstra,
                'wajib_ekstra' => $request->wajib_ekstra,
            ]);
            if($create){
                return redirect()
                ->route('ekstrakulikuler.index')
                ->with([
                    'success' => 'Ekstrakulikuler Has Been Added successfully'
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
        $data = Ekstrakulikuler::findOrFail($id);
        return view('ekstrakulikuler.edit',compact('data'));
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
        $validate = $this->validate($request,[
            'kode_ekstra' => ['required'],
            'nama_ekstra' => ['required'],
            'status_ekstra' => ['required'],
            'wajib_ekstra' => ['required'],
        ]);
        if($validate){
            $update = Ekstrakulikuler::findOrFail($id);
            $update->update([
                'kode_ekstra' => $request->kode_ekstra,
                'nama_ekstra' => $request->nama_ekstra,
                'desc_ekstra' => $request->desc_ekstra,
                'status_ekstra' => $request->status_ekstra,
                'wajib_ekstra' => $request->wajib_ekstra,
            ]);
            if($update){
                return redirect()
                ->route('ekstrakulikuler.index')
                ->with([
                    'success' => 'Ekstrakulikuler Has Been Updated successfully'
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
        $data = Ekstrakulikuler::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('ekstrakulikuler.index')
            ->with([
                'success' => 'Ekstrakulikuler Has Been Deleted successfully'
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
