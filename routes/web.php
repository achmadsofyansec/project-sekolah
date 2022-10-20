<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiayaSiswaController;
use App\Http\Controllers\BulananController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MethodeController;
use App\Http\Controllers\NonBulananController;
use App\Http\Controllers\NonBulananDetailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PembayaranSiswaController;
use App\Http\Controllers\PenerimaanLainController;
use App\Http\Controllers\PenerimaanLainDetailController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PengeluaranDetailController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PosPenerimaanController;
use App\Http\Controllers\PosPengeluaranController;
use App\Http\Controllers\PrintPDFController;
use App\Http\Controllers\RekaptulasiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\TabunganDetailController;
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
Route::get('login',[PageController::class,'login'])->name('login');
Route::group(['middleware'=>['prevent-back']],function(){
    Route::group(['middleware'=>['auth']],function(){
        Route::get('/',[PageController::class,'index'])->name('dashboard');
        //Master
        Route::resource('metode_bayar',MethodeController::class);
        Route::resource('pos_terima',PosPenerimaanController::class);
        Route::resource('pos_keluar',PosPengeluaranController::class);
        // Pembayaran
        Route::get('pembayaran_siswa',[PembayaranSiswaController::class,'index'])->name('pembayaran_siswa');
        Route::resource('bulanan',BulananController::class);
        Route::resource('non_bulanan',NonBulananController::class);
        Route::resource('bayar_non_bulanan',NonBulananDetailController::class);
        Route::resource('biaya_siswa',BiayaSiswaController::class);
        Route::resource('tabungan',TabunganController::class);
        Route::resource('tabungan_detail',TabunganDetailController::class);
        
        Route::resource('terima_lain',PenerimaanLainController::class);
        Route::resource('detail_terima_lain',PenerimaanLainDetailController::class);

        Route::resource('keluar_lain',PengeluaranController::class);
        Route::resource('detail_keluar_lain',PengeluaranDetailController::class);
        

        //Laporan
        Route::get('/laporan_harian',[LaporanController::class,'view_harian'])->name('laporan_harian');
        Route::get('/laporan_bulanan',[LaporanController::class,'view_laporan_bulanan'])->name('laporan_bulanan');
        Route::get('/laporan_tahunan',[LaporanController::class,'view_laporan_tahunan'])->name('laporan_tahunan');
        Route::get('/rekap',[RekaptulasiController::class,'view_rekap'])->name('rekap');
        Route::get('/rekap_pertrx',[RekaptulasiController::class,'view_rekap_pertrx'])->name('rekap_pertrx');
        Route::get('/tunggakan',[PageController::class,'view_tunggakan'])->name('tunggakan');
        Route::get('/riwayat_pembayaran',[HistoryController::class,'view_riwayat_bayar'])->name('riwayat_bayar');
        
        //Gateway
        Route::get('/wa_gateway',[PageController::class,'view_wa_gateway'])->name('wa_gateway');

        //Print
        Route::get('/print_pdf',[PrintPDFController::class,'laporan'])->name('print_pdf');
    });
});




