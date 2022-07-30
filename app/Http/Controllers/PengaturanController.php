<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Pengaturan;


class PengaturanController extends Controller
{
    public function index()
    {
    //     // $pengaturan = DB::table('pengaturans')->get();
 
    //     // return view('pengaturan.index',['pengaturan' => $pengaturan]);


        $pengaturan = DB::table('pengaturans')->select(['pengaturans.*'])->get();
        // return view('sekolah.index', ['kelulusan' => $kelulusan]);
        return view('pengaturan.index', compact('pengaturan'));
 
    }

    public function update(Request $request, $id) 
    {
        $pengaturan = Pengaturan::find($id);
        $pengaturan->pengumuman = $request->input('tanggal_pengumuman');
        $pengaturan->tahun = $request->input('tahun');
        $pengaturan->info_kelulusan = $request->input('informasi_kelulusan');
        $pengaturan->info_lainya = $request->input('informasi_lain');
        $pengaturan->update();
        return redirect()->back()->with('status', 'Data pengaturan Telah Di update');
    }
}
