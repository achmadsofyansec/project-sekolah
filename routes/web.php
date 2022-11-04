<?php

use App\Http\Controllers\BarangSitaanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PoinPelanggaranController;
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
        Route::get('point_siswa',[PageController::class,'view_point_siswa'])->name('point_siswa');
        Route::get('/lap_pelanggaran',[PageController::class,'view_lap_pelanggaran'])->name('lap_pelanggaran');
        Route::get('/lap_kehadiran',[PageController::class,'view_lap_kehadiran'])->name('lap_kehadiran');
        //Route::get('/lap_peminjaman',[PageController::class,'view_lap_peminjaman'])->name('lap_peminjaman');
        Route::get('/lap_sitaan',[PageController::class,'view_lap_sitaan'])->name('lap_sitaan');
    });
});



