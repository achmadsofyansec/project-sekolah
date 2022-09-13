<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiayaSiswaController;
use App\Http\Controllers\MethodeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PosPenerimaanController;
use App\Http\Controllers\PosPengeluaranController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UsersController;
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
        Route::get('/',[PageController::class,'index'])->name('dashboard');
        //Master
        Route::resource('metode_bayar',MethodeController::class);
        Route::resource('pos_terima',PosPenerimaanController::class);
        Route::resource('pos_keluar',PosPengeluaranController::class);
        // Pembayaran
        Route::get('/pembayaran_siswa',[PageController::class,'view_pembayaran_siswa'])->name('pembayaran_siswa');
        Route::resource('biaya_siswa',BiayaSiswaController::class);
        Route::get('/tabungan',[PageController::class,'view_tabungan'])->name('tabungan');
        Route::get('/terima_lain',[PageController::class,'view_terima_lain'])->name('terima_lain');
        Route::get('/keluar_lain',[PageController::class,'view_keluar_lain'])->name('keluar_lain');
        //Laporan
        Route::get('/laporan_harian',[PageController::class,'view_laporan_harian'])->name('laporan_harian');
        Route::get('/laporan_bulanan',[PageController::class,'view_laporan_bulanan'])->name('laporan_bulanan');
        Route::get('/laporan_tahunan',[PageController::class,'view_laporan_tahunan'])->name('laporan_tahunan');
        Route::get('/rekap',[PageController::class,'view_rekap'])->name('rekap');
        Route::get('/rekap_pertrx',[PageController::class,'view_rekap_pertrx'])->name('rekap_pertrx');
        Route::get('/tunggakan',[PageController::class,'view_tunggakan'])->name('tunggakan');
        Route::get('/riwayat_pembayaran',[PageController::class,'view_riwayat_bayar'])->name('riwayat_bayar');
        //Gateway
        Route::get('/wa_gateway',[PageController::class,'view_wa_gateway'])->name('wa_gateway');
    });
});




