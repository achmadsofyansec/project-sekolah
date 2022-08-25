<?php

namespace App\Http\Controllers;

use App\Models\methode_pembayaran;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class MethodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = methode_pembayaran::latest()->get();
        return view('master.metode_pembayaran.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master.metode_pembayaran.create');
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
            'nama_metode' => ['required'],
            'desc_metode' => ['required']
        ]);
        if($validate){
            $qode = Str::random(6);
            $data = methode_pembayaran::latest()->get()->count();
            $kode = 'MTD_'.$qode.$data;
            $create = methode_pembayaran::create([
                'kode_methode' => $kode,
                'nama_methode' => $request->nama_metode,
                'desc_methode' => $request->desc_metode,
            ]);
            if($create){
                return redirect()
                ->route('metode_bayar.index')
                ->with([
                    'success' => 'Methode Pembayaran Has Been Added successfully'
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
        $data = methode_pembayaran::findOrFail($id);
        if($data){
            return view('master.metode_pembayaran.edit',compact('data'));
        }
        
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
            'nama_metode' => ['required'],
            'desc_metode' => ['required']
        ]);
        if($validate){
            $update = methode_pembayaran::findOrFail($id);
            $update->update([
                'nama_methode' => $request->nama_metode,
                'desc_methode' => $request->desc_metode,
            ]);
            if($update){
                return redirect()
                ->route('metode_bayar.index')
                ->with([
                    'success' => 'Methode Pembayaran Has Been Updated successfully'
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
        $data = methode_pembayaran::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('metode_bayar.index')
            ->with([
                'success' => 'Methode Pembayaran Has Been Deleted successfully'
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
