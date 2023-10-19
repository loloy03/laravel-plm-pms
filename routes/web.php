<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
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

//login condition
route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

//for super admin only
route::get('/create-account', [SuperAdminController::class, 'create_account'])->middleware(['auth', 'super-admin'])->name('create-account');
route::post('/register-account', [SuperAdminController::class, 'register_account'])->middleware(['auth', 'super-admin'])->name('register-account');

//for admin only
route::get('/create-appointment-page', [AdminController::class, 'create_appointment_page'])->middleware(['auth', 'admin'])->name('create-appointment-page');
route::post('/store-appointment', [AdminController::class, 'store_appointment'])->middleware(['auth', 'admin'])->name('store-appointment');

//others
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
