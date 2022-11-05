<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use App\Models\jurusan;
use App\Models\Kelas;
use App\Models\pelanggaran;
use DateTime;
use Illuminate\Http\Request;

class PoinSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $jurusan = jurusan::latest()->get();
        $kelas = Kelas::latest()->get();
        $req = $request;
        $data = "";
        if($req != null){
            $kelas1 = ['aktivitas_belajars.kode_kelas','!=','null'];
            $jurusan1 = ['aktivitas_belajars.kode_jurusan','!=','null'];

            if($req->filter_poin_kelas != null){
                $kelas1 = ['aktivitas_belajars.kode_kelas','!=',$req->filter_poin_kelas];
            }
            if($req->filter_poin_jurusan != null){
                $jurusan1 = ['aktivitas_belajars.kode_jurusan','!=',$req->filter_poin_jurusan];
            }
            $data_siswas = data_siswa::join("aktivitas_belajars","aktivitas_belajars.kode_siswa","=",'data_siswas.nik')
                    ->where([['data_siswas.status_siswa','=','Aktif'],$kelas1,$jurusan1])
                    ->get(["data_siswas.*",'aktivitas_belajars.*',"data_siswas.id as id_siswas"]);
            $no = 1;
            foreach($data_siswas as $item){
                    $poin = pelanggaran::where([['id_siswa','=',$item->id_siswas]])->get();
                    $last_point = 0;
                    foreach ($poin as $point) {
                       $last_point += $point->poin_minus;
                    }
                    
                    $data .= '<tr>
                    <td>'.$no++.'</td>
                    <td>'.$item->nik.'</td>
                    <td>'.$item->nisn.'</td>
                    <td>'.$item->nama.'</td>
                    <td>'.$last_point.'</td>
                    </tr>';
            }

        }
        return view('point_siswa.index',compact(['jurusan','kelas','req','data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
        //
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
    }
}
