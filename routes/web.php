<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ProfileController;
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
// Auth Route
Route::get('/login', [AuthController::class, 'loginPage'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('login.attempt')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/registration', [AuthController::class, 'registrationPage'])->name('registration')->middleware('guest');
Route::post('/registration', [AuthController::class, 'registrationAttempt'])->name('registration.attempt')->middleware('guest');

// Dashboard Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/detail/{id}', [DashboardController::class, 'detail'])->name('dashboard.detail');
Route::post('/city', [DashboardController::class, 'fetchCity'])->name('dashboard.fetchCity');

// Profile Route
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile', [ProfileController::class, 'profileUpdate'])->name('profile.update');

// Equipment Route
Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
Route::put('/equipment', [EquipmentController::class, 'equipmentUpdate'])->name('equipment.update');