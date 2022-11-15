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
        Route::get('/uamnu',[PageController::class,'uamnu'])->name('uamnu');
        Route::get('/history_uamnu',[PageController::class,'history_uamnu'])->name('history_uamnu');
        Route::get('/bantuan',[PageController::class,'bantuan'])->name('bantuan');
        Route::get('/sarankritik',[PageController::class,'sarankritik'])->name('sarankritik');
    });
});



