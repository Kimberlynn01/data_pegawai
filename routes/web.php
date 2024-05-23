<?php

use App\Http\Controllers\AuthController;
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
    Route::prefix('/login')->name('login.')->group(function() {
        Route::get('/', [AuthController::class, 'index'])->name('index');
    });


    Route::prefix('/register')->name('register.')->group(function() {
        Route::get('/', [AuthController::class, 'index'])->name('index');
    });
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard');
});
