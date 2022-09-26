<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AnggotaEkstraController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelompokMapelController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\PindahKelasController;
use App\Http\Controllers\PredikatController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunAjaranController;
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
        Route::resource('kelas',KelasController::class);
        Route::resource('jurusan',JurusanController::class);
        Route::resource('tahun_ajaran',TahunAjaranController::class);

        Route::get('/mutasi_guru',[PageController::class,'view_mutasi_guru'])->name('mutasi_guru');
        Route::get('/mutasi_siswa',[PageController::class,'view_mutasi_siswa'])->name('mutasi_siswa');
        //Pembelajaran
        Route::resource('mapel',MapelController::class);
        Route::resource('kelompok_mapel',KelompokMapelController::class);
        Route::resource('jadwal',JadwalController::class);

        //Nilai
        Route::resource('predikat',PredikatController::class);

        //Absensi
        Route::resource('absensi',AbsensiController::class);
        Route::resource('perizinan',PerizinanController::class);

        //Laporan
        Route::get('/lap_absensi',[PageController::class,'view_lap_absensi'])->name('laporan_absensi');
        Route::get('/lap_nilai',[PageController::class,'view_lap_nilai'])->name('laporan_nilai');

        //inputnilai
        Route::get('/input_capaian',[NilaiController::class,'view_input_capaian'])->name('input_capaian');
        Route::get('/input_ekstra',[NilaiController::class,'view_input_ekstra'])->name('input_ekstra');
        Route::get('/input_harian',[NilaiController::class,'view_input_harian'])->name('input_harian');
        Route::get('/input_prestasi',[NilaiController::class,'view_input_prestasi'])->name('input_prestasi');
        Route::get('/input_rapor',[NilaiController::class,'view_input_rapor'])->name('input_rapor');
        Route::get('/input_ujian',[NilaiController::class,'view_input_ujian'])->name('input_ujian');
        Route::resource('input_nilai',NilaiController::class);
        
        //Ekstrakulikuler
        Route::resource('ekstrakulikuler',EkstrakulikulerController::class);
        Route::resource('anggota_ekstra',AnggotaEkstraController::class);
        //Pindah / Naik Kelas
        Route::resource('pindah_kelas',PindahKelasController::class);
        //AjaxRequest
        Route::post('ajaxRequest', [AjaxController::class, 'filter_absensi'])->name('ajaxRequest.filter_absensi');
        Route::post('filter_anggota_ekstra', [AjaxController::class, 'filter_anggota_ekstra'])->name('filter_anggota_ekstra');
    });
});