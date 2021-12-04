<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\UserControler;
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
    return view('hospital.dashboard');
});
Route::get('/hospital/dashboard', [ClinicController::class, 'clinic_dashboard'])->name('clinic_dashboard');
Route::get('/hospital/new/patient', [HospitalController::class, 'new_patient']);
Route::post('/save/patient', [HospitalController::class, 'store_patient'])->name('store_patient');
Route::get('/bed/management', [HospitalController::class, 'bed_management']);
Route::get('/fill/bed', [HospitalController::class, 'fill_bed']);
Route::post('/update/bed/{id}',[HospitalController::class, 'update_bed_space']);
Route::post('/bed/space', [HospitalController::class, 'store_bed']);
Route::post('/bed/search', [HospitalController::class, 'search']);
Route::get('/book/appointment', [AppointmentController::class, 'book']);
Route::get('/telephone/appointments',[AppointmentController::class, 'telephone']);
Route::post('/store/appointment', [AppointmentController::class, 'store_bookings'])->name('store_bookings');
