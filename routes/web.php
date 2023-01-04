<?php

use App\Http\Controllers\BarangSitaanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PoinPelanggaranController;
use App\Http\Controllers\PoinSiswaController;
use App\Http\Controllers\PrintPDFController;
use App\Http\Controllers\SanksiController;
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

Route::post('/signout',[PageController::class,'logout']);
Route::get('/manual_book/download',[PageController::class,'download'])->name('download');
Route::group(['middleware'=>['prevent-back']],function(){
    Route::group(['middleware'=>['auth']],function(){
        //Dashboard
        Route::get('/',[PageController::class,'index'])->name('dashboard');
        //UMUM
        //masterData
        Route::resource('point_pelanggaran',PoinPelanggaranController::class);
        Route::resource('sanksi',SanksiController::class);
        Route::resource('pelanggaran',PelanggaranController::class);
        Route::resource('kehadiran',KehadiranController::class);
        Route::resource('barang_sitaan',BarangSitaanController::class);
        //Route::get('/peminjaman',[PageController::class,'view_peminjaman'])->name('peminjaman');
        //LAIN LAIN
        Route::resource('point_siswa',PoinSiswaController::class);
        Route::get('/lap_pelanggaran',[LaporanController::class,'view_lap_pelanggaran'])->name('lap_pelanggaran');
        //Route::get('/lap_kehadiran',[PageController::class,'view_lap_kehadiran'])->name('lap_kehadiran');
        //Route::get('/lap_peminjaman',[PageController::class,'view_lap_peminjaman'])->name('lap_peminjaman');
        //Route::get('/lap_sitaan',[LaporanController::class,'view_lap_sitaan'])->name('lap_sitaan');
        Route::get('/lap_point_siswa',[LaporanController::class,'view_lap_point_siswa'])->name('lap_point_siswa');
        Route::get('/print_lap_point_siswa',[PrintPDFController::class,'lap_point_siswa'])->name('print_lap_point_siswa');
        Route::get('/print_lap_pelanggaran_siswa',[PrintPDFController::class,'lap_pelanggaran_siswa'])->name('print_lap_pelanggaran_siswa');
        Route::get('/manual_book',[PageController::class,'manual_book'])->name('manual_book');
    });
});



