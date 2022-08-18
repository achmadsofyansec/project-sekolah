<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LowonganKerjaController;
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
Route::get('login',[PageController::class,'login'])->name('login');
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


