<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
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
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/signin',[AuthController::class,'authenticate']);
Route::post('/signout',[AuthController::class,'logout']);
Route::group(['middleware'=>['prevent-back']],function(){
    Route::group(['middleware'=>['auth']],function(){
        Route::group(['middleware'=>['authCheck:admin']],function(){
            Route::get('/',[PageController::class,'index'])->name('dashboard');
            Route::get('/home',[PageController::class,'index'])->name('dashboard');
            Route::get('/sekolah',[PageController::class,'view_sekolah']);
            Route::get('/jabatan',[RoleController::class,'index']);
            Route::get('/user',[UsersController::class,'index']);
            Route::get('/pengumuman',[PageController::class,'view_pengumuman']);
            Route::get('/pemeliharaan',[PageController::class,'view_pemeliharaan']);
            Route::get('/singkronisasi',[PageController::class,'view_singkronisasi']);
        });
    });
});





