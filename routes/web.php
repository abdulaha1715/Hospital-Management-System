<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});


// Forentend Routes

Route::get('/', [HomeController::class, 'index'])->name('site-url');

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth', 'verified');

Route::post('/get-appointment', [HomeController::class, 'getAppointment'])->name('get-appointment');

Route::get('/my-appointments', [HomeController::class, 'myAppointment'])->name('my-appointments');

Route::get('/cancel-appointment/{id}', [HomeController::class, 'cancelAppointment'])->name('cancel-appointment');



// Cancelled

// Backend Routes

Route::get('/all-doctors', [AdminController::class, 'all_doctors'])->name('all-doctors');
Route::get('/add-new-doctor', [AdminController::class, 'add_doctor_view'])->name('add-new-doctor');
Route::post('/new-doctor-store', [AdminController::class, 'new_doctor_store'])->name('new-doctor-store');
Route::get('/edit-doctor/{id}', [AdminController::class, 'edit_doctor_info'])->name('edit-doctor');
Route::post('/doctor-update/{id}', [AdminController::class, 'update_doctor_info'])->name('doctor-update');
Route::get('/delete-doctor/{id}', [AdminController::class, 'delete_doctor_info'])->name('delete-doctor');

Route::get('/all-appointments', [AdminController::class, 'all_appointments'])->name('all-appointments');
Route::get('/add-new-appointment', [AdminController::class, 'add_appointment_view'])->name('add-new-appointment');
Route::get('/add-new-appointment', [AdminController::class, 'add_appointment_view'])->name('add-new-appointment');
Route::get('/appointment-approved/{id}', [AdminController::class, 'appointment_approved'])->name('appointment-approved');
Route::get('/cancel-approved/{id}', [AdminController::class, 'appointment_cancelled'])->name('appointment-cancelled');


// Route::resource('task', TaskController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
