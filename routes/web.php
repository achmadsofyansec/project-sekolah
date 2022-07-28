<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BukuController;
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

Route::get('/',[PageController::class,'index'])->name('dashboard');

Route::post('/signout',[PageController::class,'logout']);
Route::get('/master/buku',[MasterController::class,'buku']);
Route::get('/master/tambah',[PageController::class,'tambah_buku']);
Route::get('/master/export',[PageController::class,'export']);
Route::get('/master/kategori',[MasterController::class,'kategori']);
Route::get('/master/kategori_tambah',[PageController::class,'kategori_tambah']);
Route::get('/master/sumber',[MasterController::class,'sumber']);
Route::get('/master/sumber_tambah',[PageController::class,'sumber_tambah']);
Route::get('/pengaturan/denda',[PageController::class,'denda']);
Route::get('/transaksi/peminjaman',[TransaksiController::class,'peminjaman']);
Route::get('/transaksi/pengembalian',[PageController::class,'pengembalian']);
Route::get('/transaksi/daftar_peminjaman',[TransaksiController::class,'daftar_peminjaman']);
Route::get('/siswa/siswa',[MasterController::class,'siswa']);
Route::get('/laporan/buku',[PageController::class,'buku']);
Route::get('/laporan/peminjaman',[PageController::class,'laporan_peminjaman']);
Route::get('/laporan/buku',[PageController::class,'laporan_buku']);
Route::get('/laporan/pengunjung',[PageController::class,'laporan_pengunjung']);
Route::get('/app/password',[PageController::class,'password']);
Route::get('/master/data_denda',[PageController::class,'data_denda']);
Route::get('/siswa/siswa_detail',[PageController::class,'siswa_detail']);
Route::PUT('/master/buku_save',[MasterController::class,'buku_save']);
