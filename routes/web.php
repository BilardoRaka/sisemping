<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PaymentController;
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
Route::get('/registration', [AuthController::class, 'registrationPage'])->name('registration')->middleware('guest');
Route::post('/registration', [AuthController::class, 'registrationAttempt'])->name('registration.attempt')->middleware('guest');
Route::post('/registration/customer', [AuthController::class, 'registrationAttemptCustomer'])->name('registration.attemptCustomer')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/passchange',[AuthController::class, 'passwordChange'])->name('passchange')->middleware('auth');
Route::post('/passchange',[AuthController::class, 'passwordChangeAttempt'])->name('passchange.attempt')->middleware('auth');

// Dashboard Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/detail/{id}', [DashboardController::class, 'detail'])->name('dashboard.detail');
Route::post('/city', [DashboardController::class, 'fetchCity'])->name('dashboard.fetchCity');
Route::post('/rating', [DashboardController::class, 'givenRate'])->name('dashboard.rating');

// Admin Route
Route::get('/renter', [ProfileController::class, 'renterPage'])->name('profile.renter.index')->middleware('auth');
Route::delete('/renter/{id}', [ProfileController::class, 'renterDelete'])->name('profile.renter.delete')->middleware('auth');
Route::get('/equipment/master', [EquipmentController::class, 'masterPage'])->name('master.equipment.index')->middleware('auth');
Route::get('/equipment/master-create', [EquipmentController::class, 'masterCreate'])->name('master.equipment.create')->middleware('auth');
Route::post('/equipment/master/store', [EquipmentController::class, 'masterStore'])->name('master.equipment.store')->middleware('auth');
Route::delete('/equipment/master/{id}', [EquipmentController::class, 'masterDelete'])->name('master.equipment.delete')->middleware('auth');

// Renter Route
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'profileUpdate'])->name('profile.update')->middleware('auth');
Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index')->middleware('auth');
Route::post('/equipment', [EquipmentController::class, 'equipmentUpdate'])->name('equipment.update')->middleware('auth');

// Payment Route
Route::get('/detail/{id}/payment', [PaymentController::class, 'getPayment'])->name('payment.get');
Route::post('/detail/{id}/payment', [PaymentController::class, 'postPayment'])->name('payment.post');
Route::get('/payment/invoice/{reference_id}', [PaymentController::class, 'invoice'])->name('payment.invoice');

// Customer Route
Route::get('/customer/payment', [PaymentController::class, 'historyPayment'])->name('payment.history');