<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\LemariController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\UrutController;
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
        Route::resource('jenis_dokumen', JenisDokumenController::class);
        Route::get('/ruangan',[RuanganController::class,'index'])->name('ruangan');
        Route::get('/lemari',[LemariController::class,'index'])->name('lemari');
        Route::get('/rak',[RakController::class,'index'])->name('rak');
        Route::get('/box',[BoxController::class,'index'])->name('box');
        Route::get('/map',[MapController::class,'index'])->name('map');
        Route::get('/urut',[UrutController::class,'index'])->name('penyimpanan');
        Route::get('/input_dokumen',[PageController::class,'view_input_dokumen'])->name('input_dokumen');
        Route::get('/laporan',[PageController::class,'view_laporan'])->name('laporan');
        Route::get('/manual_book',[PageController::class,'view_manual_book'])->name('manual_book');
        

    });
});



