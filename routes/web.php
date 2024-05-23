<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RegisterController;
use App\Models\Pegawai;
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
    Route::prefix('/register')->name('register.')->group(function() {
        Route::get('/', [RegisterController::class, 'index'])->name('index');
        Route::post('/tambah', [RegisterController::class, 'store'])->name('store');
    });
});

Route::middleware(['auth'])->group(function() {

    Route::prefix('/dashboard')->name('dashboard.')->group(function() {
        Route::get('/',[DashboardController::class, 'index'])->name('index');
    });

    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::put('/profile/update', [AuthController::class, 'update'])->name('upload.picture');

    Route::prefix('/pegawai')->name('pegawai.')->group(function() {
        Route::get('/',[PegawaiController::class, 'index'])->name('index');
        Route::post('/data',[PegawaiController::class, 'store'])->name('store');
        Route::put('/update/{id}',[PegawaiController::class, 'update'])->name('update');
        Route::delete('/delete',[PegawaiController::class, 'delete'])->name('delete');
        Route::get('/api', [PegawaiController::class, 'api'])->name('api');
    });


    Route::get('/api', [ApiController::class, 'index']);


});
