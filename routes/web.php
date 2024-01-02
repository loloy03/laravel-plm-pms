<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\PatientController;
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
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'check.medical.history'])->name('home');

//for super admin only
route::get('/create-account', [SuperAdminController::class, 'create_account'])->middleware(['auth', 'super-admin'])->name('create-account');
route::get('/account-list', [SuperAdminController::class, 'account_list'])->middleware(['auth', 'super-admin'])->name('account-list');
route::post('/register-account', [SuperAdminController::class, 'register_account'])->middleware(['auth', 'super-admin'])->name('register-account');
route::post('/accounts/search', [SuperAdminController::class, 'account_search'])->middleware(['auth', 'super-admin'])->name('accounts-search');
route::post('/accounts/delete/{id}', [SuperAdminController::class, 'account_delete'])->middleware(['auth', 'super-admin'])->name('account-delete');
route::get('/accounts/show/{id}', [SuperAdminController::class, 'account_show'])->middleware(['auth', 'super-admin'])->name('account-show');
route::post('/accounts/edit/{id}', [SuperAdminController::class, 'account_edit'])->middleware(['auth', 'super-admin'])->name('account-edit');

//for admin only
route::get('/create-appointment-page', [AdminController::class, 'create_appointment_page'])->middleware(['auth', 'admin'])->name('create-appointment-page');
route::post('/store-appointment', [AdminController::class, 'store_appointment'])->middleware(['auth', 'admin'])->name('store-appointment');
route::get('/view-list-appointment-page', [AdminController::class, 'view_list_appointment'])->middleware(['auth', 'admin'])->name('view-list-appointment-page');
Route::get('/filter-appointments', [AdminController::class, 'view_list_appointment'])->middleware(['auth', 'admin'])->name('filter-appointments');
Route::get('/appointment/{id}', [AdminController::class, 'show_appointment'])->middleware(['auth', 'admin'])->name('show-appointmet');
Route::get('/show_user_info/{id}', [AdminController::class, 'show_user_info'])->middleware(['auth', 'admin'])->name('show_user_info');
Route::get('/appointments/{id}/download-pdf', [AdminController::class, 'downloadPDF'])->name('download_pdf');


//for patient only
route::get('/medicalhistory', [PatientController::class, 'medical_history'])->middleware(['auth', 'student'])->name('medicalhistory');
route::post('/medicalhistoryadd', [PatientController::class, 'medical_historyadd'])->middleware(['auth', 'student'])->name('medicalhistoryadd');
route::get('/appointmentspage', [PatientController::class, 'available_appointments'])->middleware(['auth', 'student'])->name('appointmentspage');
route::get('/availappointment/{id}', [PatientController::class, 'avail_appointment'])->middleware(['auth', 'student'])->name('availappointments');
Route::post('patient/appointments/confirm/{appointment_request_id}', [PatientController::class, 'confirmAppointment'])
    ->name('patient.appointments.confirm');
// Route::get('/user/details', [UserController::class, 'getUserDetails'])->name('user.details');

//othersS
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
