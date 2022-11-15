<?php

use App\Http\Controllers\PageController;
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
        Route::get('/devices_wa',[PageController::class,'view_devices_wa'])->name('devices_wa');
        Route::get('/message_wa',[PageController::class,'view_message_wa'])->name('message_Wa');
        Route::get('/outbox_wa',[PageController::class,'view_outbox_wa'])->name('outbox_wa');
    });
});

