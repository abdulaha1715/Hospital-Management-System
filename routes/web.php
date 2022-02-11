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



Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'home']);

Route::post('/get-appointment', [HomeController::class, 'getAppointment']);











Route::get('/add-new-doctor', [AdminController::class, 'add_doctor_view']);

Route::post('/store', [AdminController::class, 'store']);

// Route::resource('task', TaskController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
