<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['guest'])->group(function() {

    // Login Route
    Route::prefix('/login')->name('login.')->group(function() {
        Route::get('/', [AuthController::class, 'index'])->name('index');
        Route::post('/auth', [AuthController::class, 'postlogin'])->name('store');
    });

    // Register Route
    // Route::prefix('/register')->name('register.')->group(function() {
    //     Route::get('/', [RegisterController::class, 'index'])->name('index');
    //     Route::post('/', [RegisterController::class, 'store'])->name('store');
    // });
});

Route::middleware(['auth'])->group(function() {

    Route::prefix('/dashboard')->name('dashboard.')->group(function() {
        Route::get('/',[DashboardController::class, 'index'])->name('index');
    });

    Route::put('/profile/picture/update', [AuthController::class, 'update']);

    Route::prefix('/pegawai')->name('pegawai.')->group(function() {
        Route::get('/',[PegawaiController::class, 'index'])->name('index');
        Route::post('/data',[PegawaiController::class, 'store'])->name('store');
        Route::delete('/delete',[PegawaiController::class, 'delete'])->name('delete');
    });
});
