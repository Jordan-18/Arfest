<?php

use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use function GuzzleHttp\Promise\queue;

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

// Dashboard->auth
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/point', [PointController::class, 'index'])->name('point');
    Route::get('/point/create',[PointController::class, 'create'])->name('create-point');
    Route::get('/event', [EventController::class, 'index'])->name('event');
});

// hak Admin
Route::middleware(['auth:sanctum', 'verified','admin'])->group(function (){
    // admin user
    Route::get('/user', [AdminUserController::class, 'index'])->name('user');
    Route::delete('/user/{id}',[AdminUserController::class,'destroy'])->name('destroy');
    Route::get('/user/edit/{id}',[AdminUserController::class, 'edit'])->name('edit-user');
    Route::put('/edit/{id}',[AdminUserController::class, 'update'])->name('update-user');
    
    // admin event
    Route::get('/events',[AdminEventController::class, 'index'])->name('events');
    Route::delete('/event/{id}',[AdminEventController::class,'destroy'])->name('destroy');
    Route::get('/event/edit/{id}',[AdminEventController::class, 'edit'])->name('event-edit');
    Route::put('/edit/{id}',[AdminEventController::class, 'update'])->name('event-update');
});
// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register');