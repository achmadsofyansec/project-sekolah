<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SumberController;
use App\Http\Controllers\PeminjamanBukuController;
use App\Http\Controllers\PeminjamanBukuDtsController;
use App\Http\Controllers\AjaxController;
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
Route::resource('buku',DataBukuController::class);
Route::resource('kategori',KategoriController::class);
Route::resource('sumber',SumberController::class);
Route::resource('peminjaman_buku',PeminjamanBukuController::class);
Route::resource('peminjaman_buku_dts',PeminjamanBukuDtsController::class);


Route::get('/pengaturan/denda',[PageController::class,'denda']);
Route::get('pinjam',[PeminjamanBukuController::class,'search']);
Route::get('/pengaturan/denda_save',[PageController::class,'denda']);
Route::get('/siswa/siswa',[PageController::class,'siswa']);
Route::get('/laporan/buku',[PageController::class,'buku']);
Route::get('/laporan/peminjaman',[PageController::class,'laporan_peminjaman']);
Route::get('/laporan/buku',[PageController::class,'laporan_buku']);
Route::get('/laporan/pengunjung',[PageController::class,'laporan_pengunjung']);
Route::get('/app/password',[PageController::class,'password']);
Route::get('/master/data_denda',[MasterController::class,'data_denda']);
Route::get('/siswa/siswa_detail',[PageController::class,'siswa_detail']);
Route::post('ajaxRequest', [AjaxController::class, 'filter_buku'])->name('ajaxRequest.filter_buku');


