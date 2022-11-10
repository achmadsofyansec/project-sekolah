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

//View Pages In Admin Dashboard
Route::get('/',[PageController::class,'index'])->name('dashboard');

// Portal

 Route::get('/portal', [CariController::class, 'portal'])->name('portal');
 Route::post('/cekNomor', [CariController::class, 'cekNomor'])->name('cari');
 Route::get('/hasil/{id}', [CariController::class, 'hasilCari'])->name('hasil');
 Route::get('/cetak/{id}', [CariController::class, 'cetak'])->name('cetak');

// Nilai
Route::resource('/nilai', NilaiController::class);

// Pengaturan
// Route::resource('/pengaturan', PengaturanPortalController::class);
// Route::get('/home',[PageController::class,'index'])->name('dashboard');
// Route::get('/datasiswa', [Data_siswaController::class, 'index']);
// Route::get('/pengumuman',[PageController::class,'view_pengumuman']);
// Route::get('/pemeliharaan',[PageController::class,'view_pemeliharaan']);
// Route::get('/singkronisasi',[PageController::class,'view_singkronisasi']);
// Route::resource('pengaturan',PengaturanController::class);
// Route::put('update-pengaturan/{id}', [PengaturanController::class,'update']);
// Route::get('/kelulusan',[KelulusanController::class,'index']);
// Route::get('/cari', [CariController::class, 'cari']);



// Route::get('/kelulusan', function () {
//     return view('kelulusan.index');
// );

// Route::get('/sekolah', function() {
//     return view('sekolah.index', [
//         'title' => 'Data kelulusan',
//         'categories' => Category::all()
//     ]);
// });






