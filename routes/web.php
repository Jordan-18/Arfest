<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PointController;
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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/point', [PointController::class, 'index'])->name('point');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/register', [FrontendController::class, 'register'])->name('register');
Route::post('/register', [FrontendController::class, 'register'])->name('register');
Route::get('/login', [FrontendController::class, 'login'])->name('login');
Route::get('/login/forget', [FrontendController::class, 'forget'])->name('forget-pass');
