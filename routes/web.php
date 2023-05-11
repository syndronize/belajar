<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\UserController;

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


Route::middleware(['belum_login'])->group(function () {
    Route::get('/' , [AuthController::class,'login'])->name('login');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/aksiregister',[AuthController::class,'aksiregister'])->name('aksiregis');
    Route::post('/aksilogin',[AuthController::class,'aksilogin'])->name('aksilogin');
});
Route::middleware(['sudah_login'])->group(function () {
    Route::get('/home',[DashboardControllers::class,'index'])->name('home');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    // Users
    Route::get('/user',[UserController::class,'index'])->name('user-home');
});

