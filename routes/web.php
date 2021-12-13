<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SuperAdminController;
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
Route::get('/login',[SuperAdminController::class, 'show_login'])->name('login');
Route::get('/loging',[SuperAdminController::class, 'process_login']);
Route::get('/super/admin/new/',[SuperAdminController::class, 'register']);
Route::post('/super/admin/store/new',[SuperAdminController::class, 'store_reg']);
Route::get('/hospital/dashboard', [ClinicController::class, 'clinic_dashboard'])->name('clinic_dashboard');
Route::get('/hospital/new/patient', [HospitalController::class, 'new_patient']);
Route::post('/save/patient', [HospitalController::class, 'store_patient'])->name('store_patient');
Route::get('/change-passport/{id}', [HospitalController::class, 'change_passport']);
Route::post('/store/update/{id}', [HospitalController::class, 'update_passport']);
Route::get('/update/patient/{id}',[HospitalController::class, 'update_patient']);
Route::post('/save/patient/update/{id}',[HospitalController::class, 'store_patient_update']);
Route::get('/bed/management', [HospitalController::class, 'bed_management']);
Route::get('/fill/bed', [HospitalController::class, 'fill_bed']);
Route::post('/update/bed/{id}',[HospitalController::class, 'update_bed_space']);
Route::get('/bed/history',[HospitalController::class, 'all_history']);
Route::get('/view/all/patient/action',[HospitalController::class, 'all_patient_search']);
Route::get('/view/all/patient',[HospitalController::class, 'all_patient']);
Route::get('/patient/details/{id}',[HospitalController::class, 'patient_details']);
Route::post('/bed/space', [HospitalController::class, 'store_bed']);
Route::get('/bed/search', [HospitalController::class, 'search']);
Route::get('/bed/detail/{id}', [HospitalController::class, 'bed_detail']);
Route::get('/fill/existing/patient', [HospitalController::class, 'existing_patient']);
Route::get('/confirm/patient',[HospitalController::class, 'confirm_identity']);
Route::get('/use/existing/{id}', [HospitalController::class, 'use_existing']);
Route::post('/existing/store/{id}', [HospitalController::class,'store_using_existing']);
Route::get('/book/appointment', [AppointmentController::class, 'book']);
Route::get('/prebooked/appointment', [AppointmentController::class, 'routine']);
Route::get('/telephone/appointments',[AppointmentController::class, 'telephone']);
Route::post('/store/appointment', [AppointmentController::class, 'store_bookings'])->name('store_bookings');
Route::get('/inventory/dashboard', [InventoryController::class, 'dashboard']);
Route::get('/add/item', [InventoryController::class, 'show_add']);
Route::post('/store/item', [InventoryController::class, 'store_add']);
Route::get('/delete/item/{id}', [InventoryController::class, 'delete_item']);
Route::get('/all/items', [InventoryController::class, 'view_all']);
Route::get('/item/details/{id}', [InventoryController::class, 'item_details']);
Route::get('/assign/item/{id}', [InventoryController::class, 'assign']);
Route::post('/store/assign', [InventoryController::class, 'store_assign']);
Route::get('/edit/item/{id}', [InventoryController::class, 'edit_item']);
Route::post('/store/edit/item/{id}', [InventoryController::class, 'store_edit']);
