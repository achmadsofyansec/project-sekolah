<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PendaftaranSiswaController;
use App\Http\Controllers\PendaftaranSiswaPortalController;

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
Route::get('login',[PageController::class,'login'])->name('login');
Route::group(['middleware'=>['prevent-back']],function(){
    Route::group(['middleware'=>['auth']],function(){
        // Home
        Route::get('/',[PageController::class,'index'])->name('dashboard');
        
        // Pendaftar
        Route::resource('/pendaftar', PendaftaranSiswaController::class);

        // Pengaturan
        Route::resource('/pengaturan', PengaturanController::class);
        
        // Manual Book
        Route::get('/manual_book',[PageController::class,'view_manual_book'])->name('manual_book');
    });
});

        // Portal User
        Route::get('/pengumuman',[PortalController::class,'index'])->name('pengumuman');
        Route::post('/pengumuman/cari',[PortalController::class,'cari'])->name('cari');
        Route::get('/pengumuman/{id}',[PortalController::class,'hasil'])->name('hasil');
        
        Route::get('/portal',[PageController::class,'view_portal'])->name('portal');
        Route::resource('/portal-pendaftaran', PendaftaranSiswaPortalController::class);



