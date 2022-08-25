<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GedungController;

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
        Route::get('/umum',[PageController::class,'view_umum'])->name('umum');
        Route::resource('gedung', GedungController::class);
        Route::get('/ruangan',[PageController::class,'view_ruangan'])->name('ruangan');
        Route::get('/lapangan',[PageController::class,'view_lapangan'])->name('lapangan');
        Route::get('/sarana_belajar',[PageController::class,'view_sarana_belajar'])->name('sarana_belajar');
        Route::get('/aset_lain',[PageController::class,'view_aset_lain'])->name('aset_lain');
        Route::get('/aset_tt',[PageController::class,'view_aset_tt'])->name('aset_tidak_tetap');
        Route::get('/kategori_aset_tt',[PageController::class,'view_kategori_aset_tt'])->name('kategori_aset_tt');
        //Peminjaman
        Route::get('/peminjaman',[PageController::class,'view_peminjaman'])->name('peminjaman');
        Route::get('/pengembalian',[PageController::class,'view_pengembalian'])->name('pengembalian');
        Route::get('/denda',[PageController::class,'view_denda'])->name('denda');
        //Laporan
        Route::get('/laporan_aset',[PageController::class,'view_laporan_aset'])->name('laporan_aset');
        Route::get('/laporan_peminjaman',[PageController::class,'view_laporan_peminjaman'])->name('laporan_peminjaman');
        Route::get('/laporan_pengembalian',[PageController::class,'view_laporan_pengembalian'])->name('laporan_pengembalian');
        // Manual Book
        Route::get('/manual_book',[PageController::class,'view_manual_book'])->name('manual_book');
    });
});



