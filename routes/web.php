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
        Route::get('/wa',[WAController::class,'index'])->name('wa');
        Route::get('/outbox',[PageController::class,'view_outbox'])->name('outbox');
    });
});

