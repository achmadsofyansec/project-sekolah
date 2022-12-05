<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PendaftaranSiswaController;

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
        Route::resource('/pendaftar', PendaftaranSiswaController::class);
        Route::get('/pengumuman',[PageController::class,'view_pengumuman'])->name('pengumuman');
        Route::get('/portal',[PageController::class,'view_portal'])->name('portal');
        Route::get('/pengaturan',[PageController::class,'view_pengaturan'])->name('pengaturan');
        Route::get('/manual_book',[PageController::class,'view_manual_book'])->name('manual_book');
    });
});



