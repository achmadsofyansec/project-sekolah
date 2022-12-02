<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CariController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Data_siswaController;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PengaturanPortalController;
use App\Http\Controllers\PortalKelulusanController;
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


Route::post('/signout',[PageController::class,'logout']);
Route::get('login',[PageController::class,'login'])->name('login');
Route::group(['middleware'=>['prevent-back']],function(){
    Route::group(['middleware'=>['auth']],function(){
        //View Pages In Admin Dashboard
        Route::get('/',[PageController::class,'index'])->name('dashboard');

        // Nilai
        Route::resource('/nilai', NilaiController::class);

        // Pengaturan Portal
        Route::resource('/pengaturan', PengaturanPortalController::class);
    });
});

// Portal

Route::get('/portal', [CariController::class, 'portal'])->name('portal');
Route::post('/cekNomor', [CariController::class, 'cekNomor'])->name('cari');
Route::get('/hasil/{id}', [CariController::class, 'hasilCari'])->name('hasil');
Route::get('/cetak/{id}', [CariController::class, 'cetak'])->name('cetak');





