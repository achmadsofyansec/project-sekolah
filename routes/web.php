<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\TamuController;
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
Route::get('/portal',[PageController::class,'view_portal'])->name('portal');
Route::post('/portal/tambah',[PageController::class,'store_portal'])->name('tambah_portal');
Route::group(['middleware'=>['prevent-back']],function(){
    Route::group(['middleware'=>['auth']],function(){
        //Dashboard
        Route::get('/',[PageController::class,'index'])->name('dashboard');
        Route::resource('tamu',TamuController::class);
        Route::resource('agenda',AgendaController::class);
        Route::get('/manual_book',[PageController::class,'view_book'])->name('book');
    });
});
