<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SumberController;
use App\Http\Controllers\PeminjamanBukuController;
use App\Http\Controllers\PeminjamanBukuDtController;
use App\Http\Controllers\PengembalianBukuController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ExportImport;
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

//export
Route::get('/export_buku',[ExportImport::class,'ExportBuku'])->name('export_buku');
Route::get('/export_peminjaman',[ExportImport::class,'ExportPeminjaman'])->name('export_peminjaman');
Route::get('/export_pengunjung',[ExportImport::class,'ExportPengunjung'])->name('export_pengunjung');

Route::group(['middleware'=>['prevent-back']],function(){
    Route::group(['middleware'=>['auth']],function(){
        Route::get('/',[PageController::class,'index'])->name('dashboard');
//transaksi
Route::resource('buku',DataBukuController::class);
Route::resource('kategori',KategoriController::class);
Route::resource('sumber',SumberController::class);
Route::resource('peminjaman_buku',PeminjamanBukuController::class);
Route::resource('pengembalian',PengembalianBukuController::class);
Route::resource('data_peminjaman',PeminjamanBukuDtController::class);
Route::resource('denda',DendaController::class);

//denda
Route::post('/pengaturan/denda_save',[PageController::class,'denda_save']);
Route::get('/pengaturan/denda',[PageController::class,'denda']);

//laporan
Route::get('/laporan/buku',[PageController::class,'buku']);
Route::get('/laporan/peminjaman',[PageController::class,'laporan_peminjaman']);
route::get('/laporan/peminjaman',[PageController::class,'cari_peminjaman'])->name('cari_peminjaman');
Route::get('/laporan/buku',[PageController::class,'laporan_buku']);
Route::get('/laporan/pengunjung',[PageController::class,'laporan_pengunjung']);
route::get('/laporan/pengunjung',[PageController::class,'cari_pengunjung'])->name('cari_pengunjung');

//ajax
Route::post('ajaxRequest', [AjaxController::class, 'filter_buku'])->name('ajaxRequest.filter_buku');
Route::post('ajaxRequestNisn', [AjaxController::class, 'filter_siswa'])->name('ajaxRequestNisn.filter_siswa');
Route::post('ajaxRequestTable', [AjaxController::class, 'filter_table'])->name('ajaxRequestTable.filter_table');
});


});