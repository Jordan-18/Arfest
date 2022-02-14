<?php

use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\Event;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/create-symlink', function() {
    Artisan::call('storage:link');
    return 'The links have been created.';
});
// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); 
Route::post('/login',[LoginController::class, 'authenticate'])->name('login-auth');
Route::get('/login/forget', [LoginController::class, 'forget'])->name('forget-pass');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

// frontend
Route::get('/', [DashboardController::class, 'index'])->name('index');

// point
Route::get('/point', [PointController::class, 'index'])->name('point');
Route::get('/point/create',[PointController::class, 'create'])->name('create-point');
Route::post('/point/create',[PointController::class, 'store'])->name('store-point');
Route::get('/event', [EventController::class, 'index'])->name('event');

// Dashboard->auth
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/create/event',[EventController::class, 'create'])->name('create-event');
    Route::post('/create/event',[EventController::class, 'store'])->name('store-event');
    Route::get('/event/detail/{id}',[EventController::class, 'show'])->name('event-detail');
    Route::post('/event/store/{id}',[EventController::class, 'join'])->name('event-join');

    Route::get('user/profile/{id}',[UserController::class,'profile'])->name('profile-edit');
    Route::put('user-profile/{id}',[UserController::class, 'update'])->name('profile-update');
});

// hak Admin
Route::middleware(['auth:sanctum', 'verified','admin'])->group(function (){
    // admin user
    Route::get('/user', [AdminUserController::class, 'index'])->name('user');
    Route::delete('user/{id}',[AdminUserController::class,'destroy'])->name('destroy-user');
    Route::get('/user/edit/{id}',[AdminUserController::class, 'edit'])->name('edit-user');
    Route::put('/edit-user/{id}',[AdminUserController::class, 'update'])->name('user-update');
    
    // admin event
    Route::get('/events',[AdminEventController::class, 'index'])->name('events');
    Route::post('/event/{id}',[AdminEventController::class,'action'])->name('event-action');
});
// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

// Page Not Found 404
Route::fallback(function(){
    return view('404');
});