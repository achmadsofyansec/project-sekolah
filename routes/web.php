<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LowonganKerjaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UsersController;
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
Route::get('login',[PageController::class,'login'])->name('login');
Route::get('portal',[PageController::class,'portal'])->name('portal');
Route::get('portal/detail/{id}',[PageController::class,'detail'])->name('detail');
Route::get('portal/pengumuman',[PageController::class,'portal_pengumuman'])->name('pengumuman');
Route::get('portal/pengumuman/{id}',[PageController::class,'detail_pengumuman'])->name('pengumuman');
Route::get('/export_alumni',[ExportImport::class,'ExportAlumni'])->name('export_alumni');
Route::get('login',[PageController::class,'portal_login'])->name('login');
Route::post('/signout',[PageController::class,'logout']);
Route::group(['middleware'=>['prevent-back']],function(){
    Route::group(['middleware'=>['auth']],function(){
        Route::get('/',[PageController::class,'index'])->name('dashboard');
        Route::resource('lowongan',LowonganKerjaController::class);
        Route::resource('pengumuman',PengumumanController::class);
        Route::get('/alumni',[PageController::class,'view_alumni'])->name('alumni');
        Route::get('/konfirmasi',[PageController::class,'view_konfirmasi'])->name('konfirmasi');
        Route::get('/laporan',[PageController::class,'view_laporan'])->name('laporan');
        Route::get('/manual_book',[PageController::class,'view_manual'])->name('manual_book');
    });
});


