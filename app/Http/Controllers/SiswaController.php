<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = data_siswa::latest()->get();
        return view('siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }
    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data = data_siswa::findOrFail($id);
        return view('siswa.edit',compact('data'));
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
