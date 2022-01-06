<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\RegisterController;
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
// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); 
Route::post('/login',[LoginController::class, 'authenticate'])->name('login-auth');
Route::get('/login/forget', [LoginController::class, 'forget'])->name('forget-pass');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

// frontend
Route::get('/', [DashboardController::class, 'index'])->name('index');

// Dashboard
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/point', [PointController::class, 'index'])->name('point');
    Route::get('/event', [EventController::class, 'index'])->name('event');
});
// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register');