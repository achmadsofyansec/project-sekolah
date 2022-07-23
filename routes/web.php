<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//View Pages In Admin Dashboard
Route::get('/back',[PageController::class,'back'])->name('back');
Route::post('/signout',[PageController::class,'logout'])->name('signout');
Route::group(['middleware'=>['prevent-back']],function(){
    Route::group(['middleware'=>['auth']],function(){
        // Page View
        Route::get('/',[PageController::class,'index'])->name('dashboard');
        Route::resource('siswa',SiswaController::class);
        Route::resource('guru',GuruController::class);
        Route::get('/kelas',[PageController::class,'view_kelas'])->name('kelas');
        Route::get('/jurusan',[PageController::class,'view_jurusan'])->name('jurusan');
        Route::get('/tahun_ajaran',[PageController::class,'view_tahunajaran'])->name('tahun_ajaran');
        //Pembelajaran
        Route::get('/mapel',[PageController::class,'view_mapel'])->name('mapel');
        Route::get('/kelompok_mapel',[PageController::class,'view_kelompok'])->name('kelompok_mapel');
        Route::get('/jadwal',[PageController::class,'view_jadwal'])->name('jadwal');
        //Nilai
        Route::get('/predikat',[PageController::class,'view_predikat'])->name('predikat');
        //Absensi
        Route::get('/absensi',[PageController::class,'view_absensi'])->name('absensi');
        Route::get('/perizinan',[PageController::class,'view_perizinan'])->name('perizinan');
        //Laporan
        Route::get('/lap_absensi',[PageController::class,'view_lap_absensi'])->name('laporan_absensi');
        Route::get('/lap_nilai',[PageController::class,'view_lap_nilai'])->name('laporan_nilai');
        //inputnilai
        Route::get('/input_capaian',[PageController::class,'view_input_capaian'])->name('input_capaian');
        Route::get('/input_ekstra',[PageController::class,'view_input_ekstra'])->name('input_ekstra');
        Route::get('/input_harian',[PageController::class,'view_input_harian'])->name('input_harian');
        Route::get('/input_prestasi',[PageController::class,'view_input_prestasi'])->name('input_prestasi');
        Route::get('/input_rapor',[PageController::class,'view_input_rapor'])->name('input_rapor');
        Route::get('/input_ujian',[PageController::class,'view_input_ujian'])->name('input_ujian');
        //Ekstrakulikuler
        Route::get('/ekstrakulikuler',[PageController::class,'view_ekstra'])->name('ekstrakulikuler');
        //Pindah / Naik Kelas
        Route::get('/pindah_kelas',[PageController::class,'view_pindah'])->name('pindah_kelas');
        
    });
});