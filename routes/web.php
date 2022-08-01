<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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
Route::get('/master/buku/',[PageController::class,'buku']);
Route::get('/master/buku/tambah',[PageController::class,'tambah_buku']);
Route::get('/master/buku/export',[PageController::class,'export']);
Route::get('/master/kategori/',[PageController::class,'kategori']);
Route::get('/master/kategori/kategori_tambah',[PageController::class,'kategori_tambah']);
Route::get('/master/sumber/',[PageController::class,'sumber']);
Route::get('/master/sumber/sumber_tambah',[PageController::class,'sumber_tambah']);
Route::get('/pengaturan/denda/',[PageController::class,'denda']);
Route::get('/transaksi/peminjaman/',[PageController::class,'peminjaman']);
Route::get('/transaksi/pengembalian/',[PageController::class,'pengembalian']);
Route::get('/siswa/siswa',[PageController::class,'siswa']);
Route::get('/laporan/buku',[PageController::class,'buku']);
Route::get('/laporan/peminjaman',[PageController::class,'laporan_peminjaman']);
Route::get('/laporan/buku',[PageController::class,'laporan_buku']);
Route::get('/laporan/pengunjung',[PageController::class,'laporan_pengunjung']);
Route::get('/app/password',[PageController::class,'password']);
Route::get('/master/data_denda',[PageController::class,'data_denda']);
Route::get('/siswa/siswa_detail',[PageController::class,'siswa_detail']);
Route::PUT('/master/buku_save',[PageController::class,'buku_save']);
