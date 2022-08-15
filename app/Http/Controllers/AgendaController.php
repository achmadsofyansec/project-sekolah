<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agenda = Agenda::latest()->get();
        return view('agenda.index',compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agenda.create');
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
            'tgl_mulai' => ['required'],
            'tgl_selesai' => ['required'],
            'agenda' => ['required'],
            'desc_agenda' => ['required'],
        ]);
        if($validate){
            $create = Agenda::create([
                'tgl_mulai_agenda' => $request->tgl_mulai,
                'tgl_selesai_agenda' => $request->tgl_selesai,
                'nama_agenda' => $request->agenda,
                'desc_agenda' => $request->desc_agenda,
            ]);
            if($create){
                return redirect()
                ->route('agenda.index')
                ->with([
                    'success' => 'Agenda Has Been Added successfully'
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
        $data = Agenda::findOrFail($id);
        return view('agenda.edit',compact('data'));
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
            'tgl_mulai' => ['required'],
            'tgl_selesai' => ['required'],
            'agenda' => ['required'],
            'desc_agenda' => ['required'],
        ]);
        if($validate){
            $update = Agenda::findOrFail($id);
            $update->update([
                'tgl_mulai_agenda' => $request->tgl_mulai,
                'tgl_selesai_agenda' => $request->tgl_selesai,
                'nama_agenda' => $request->agenda,
                'desc_agenda' => $request->desc_agenda,
            ]);
            if($update){
                return redirect()
                ->route('agenda.index')
                ->with([
                    'success' => 'Agenda Has Been Updated successfully'
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
        $data = Agenda::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()
            ->route('agenda.index')
            ->with([
                'success' => 'Agenda Has Been Deleted successfully'
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
