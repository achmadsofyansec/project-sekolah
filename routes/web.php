<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\KebutuhanTambahanController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\OlahragaSeniController;
use App\Http\Controllers\MebelController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\PeneranganInternetController;
use App\Http\Controllers\SaranaAdministrasiController;
use App\Http\Controllers\SaranaBelajarController;
use App\Http\Controllers\AsetLainController;
use App\Http\Controllers\DataAsetTTController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\LahanController;



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
        //Data Asset
        Route::resource('gedung', GedungController::class);
        Route::resource('/ruangan', RuanganController::class);
        Route::resource('/lapangan', LapanganController::class);
        Route::resource('/sarana_belajar', SaranaBelajarController::class);
        Route::resource('/aset_lain', AsetLainController::class);
        Route::resource('/aset_tt', DataAsetTTController::class);
        Route::resource('/kategori_aset_tt', KategoriController::class);
        Route::resource('/kebutuhan_tambahan', KebutuhanTambahanController::class);
        Route::resource('/laboratorium', LaboratoriumController::class);
        Route::resource('/lahan', LahanController::class);
        Route::resource('/mebel', MebelController::class);
        Route::resource('/olahraga_seni', OlahragaSeniController::class);
        Route::resource('/penerangan_internet', PeneranganInternetController::class);
        Route::get('/sanitasi',[PageController::class,'view_sanitasi'])->name('sanitasi');
        Route::resource('/sarana_administrasi', SaranaAdministrasiController::class);

        //Peminjaman
        Route::resource('/peminjaman', PeminjamanController::class);
        Route::resource('/pengembalian', PengembalianController::class);
        Route::get('/denda',[PageController::class,'view_denda'])->name('denda');
        
        //Laporan
        Route::get('/laporan_aset',[PageController::class,'view_laporan_aset'])->name('laporan_aset');
        Route::get('/laporan_peminjaman',[PageController::class,'view_laporan_peminjaman'])->name('laporan_peminjaman');
        Route::get('/laporan_pengembalian',[PageController::class,'view_laporan_pengembalian'])->name('laporan_pengembalian');
        
        // Manual Book
        Route::get('/manual_book',[PageController::class,'view_manual_book'])->name('manual_book');

        // Ajax
        Route::post('ajaxRequestNisn', [AjaxController::class, 'filter_siswa'])->name('ajaxRequestNisn.filter_siswa');
    });
});



