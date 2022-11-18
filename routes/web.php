<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\WAController;
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
        Route::get('/aplikasi',[PageController::class,'view_app'])->name('aplikasi');
        Route::resource('/wa',WAController::class);
        Route::get('/wa/{id}/scan',[WAController::class,'scan'])->name('wa_scan');
        Route::get('/wa/{id}/disconnect',[WAController::class,'disconnect'])->name('wa_disconnect');
        Route::get('/wa/modul_connect',[WAController::class,'modul_connect'])->name('modul_connect');
        Route::get('/outbox',[PageController::class,'view_outbox'])->name('outbox');
    });
});

