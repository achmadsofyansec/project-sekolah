<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
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
        Route::get('/jenis_dokumen',[PageController::class,'view_jenis'])->name('jenis');
        Route::get('/ruangan',[PageController::class,'view_ruangan'])->name('ruangan');
        Route::get('/lemari',[PageController::class,'view_lemari'])->name('lemari');
        Route::get('/rak',[PageController::class,'view_rak'])->name('rak');
        Route::get('/box',[PageController::class,'view_box'])->name('box');
        Route::get('/map',[PageController::class,'view_map'])->name('map');
        Route::get('/input_dokumen',[PageController::class,'view_input_dokumen'])->name('input_dokumen');
        Route::get('/laporan',[PageController::class,'view_laporan'])->name('laporan');
        Route::get('/manual_book',[PageController::class,'view_manual_book'])->name('manual_book');
        

    });
});



