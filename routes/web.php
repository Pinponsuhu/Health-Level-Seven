<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DepartmentAppointment;
use App\Http\Controllers\DepartmentBed;
use App\Http\Controllers\DepartmentChat;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentInventory;
use App\Http\Controllers\DepartmentPatient;
use App\Http\Controllers\DepartmentRadiology;
use App\Http\Controllers\HospitalAdminController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\HospitalLoginController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\NewHospitalController;
use App\Http\Controllers\RadiologyController;
use App\Http\Controllers\routineController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdminLogin;
use App\Http\Controllers\SuperAdminRegistration;
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
Route::get('/login',[HospitalLoginController::class, 'show_login'])->name('login');
Route::get('/loging',[HospitalLoginController::class, 'process_login']);
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
Route::get('/prebooked/appointment', [AppointmentController::class, 'prebooked']);
Route::get('/routine/appointment', [AppointmentController::class, 'routine']);
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
Route::get('/send/reminder', [routineController::class, 'reminder']);
Route::get('/upload/radiology',[RadiologyController::class, 'show_form']);
Route::post('/upload/radiology',[RadiologyController::class, 'store_credentials']);
Route::get('/track/uploads',[RadiologyController::class, 'track_uploads']);
Route::get('/upload/details/{id}',[RadiologyController::class, 'upload_details']);
Route::post('/add/result/{id}',[RadiologyController::class, 'add_result']);
Route::get('/chat/overview',[ChatController::class, 'overview']);
Route::get('/admin/overview',[HospitalAdminController::class, 'overview']);
Route::get('/add/department',[HospitalAdminController::class, 'add_department']);
Route::post('/store/deparment',[HospitalAdminController::class, 'store_department']);
Route::get('/staff/registration',[HospitalAdminController::class, 'staff_form']);
Route::post('/staff/registration',[HospitalAdminController::class, 'store_staff'])->name('staff_reg');
Route::get('/all/staffs',[HospitalAdminController::class, 'all_staff']);
Route::get('/all/departments',[HospitalAdminController::class, 'all_department']);
Route::get('/department/login',[HospitalAdminController::class, 'login']);
Route::post('/department/login',[HospitalAdminController::class, 'sign_in']);

//Department logics
Route::get('/department/login',[DepartmentController::class,'show_login'])->middleware('guest');
Route::post('/department/login',[DepartmentController::class, 'login']);
Route::get('/department/dashboard',[DepartmentController::class, 'department_dashboard'])->middleware('department');
Route::get('/department/add/radiology',[DepartmentRadiology::class, 'show_form'])->middleware('department');
Route::post('/department/upload/radiology',[DepartmentRadiology::class, 'store_credentials']);
Route::get('/department/track/uploads',[DepartmentRadiology::class,'track_uploads'])->middleware('department');
Route::get('/upload/details/{id}',[DepartmentRadiology::class, 'upload_details']);
Route::post('/add/result/{id}',[DepartmentRadiology::class, 'add_result']);
Route::get('/department/new/patient',[DepartmentPatient::class,'new_patient'])->middleware('department');
Route::post('/department/new/patient',[DepartmentPatient::class,'store_patient']);
Route::get('/department/all/patient',[DepartmentPatient::class, 'all_patient']);
Route::get('/department/patient/details/{id}',[DepartmentPatient::class, 'patient_details']);
Route::get('/department/change-passport/{id}',[DepartmentPatient::class, 'change_passport']);
Route::post('/department/store/update/{id}',[DepartmentPatient::class, 'update_passport']);
Route::get('/department/update/patient/{id}',[DepartmentPatient::class, 'update_patient']);
Route::post('/department/patient/update/{id}',[DepartmentPatient::class, 'store_patient_update']);
Route::get('/department/bed/management',[DepartmentBed::class, 'bed_management']);
Route::get('/department/existing/patient',[DepartmentBed::class, 'existing_patient']);
Route::get('/department/confirm/patient',[DepartmentBed::class, 'confirm_identity']);
Route::get('/department/use/existing/{id}',[DepartmentBed::class, 'use_existing']);
Route::get('/department/fill/bed',[DepartmentBed::class, 'fill_bed']);
Route::post('/department/bed/space',[DepartmentBed::class, 'store_bed']);
Route::get('/department/bed/search',[DepartmentBed::class, 'search']);
Route::get('/department/bed/detail/{id}',[DepartmentBed::class, 'bed_detail']);
Route::get('/department/bed/history',[DepartmentBed::class, 'all_history']);
Route::post('/department/update/bed/{id}', [DepartmentBed::class, 'update_bed_space']);
Route::get('/department/routine/appointment', [DepartmentAppointment::class, 'routine']);
Route::get('/department/telephone/appointments', [DepartmentAppointment::class, 'telephone']);
Route::get('/department/book/appointment',[DepartmentAppointment::class, 'book']);
Route::post('/department/book/appointment', [DepartmentAppointment::class,'store_bookings']);
route::get('/department/inventory/dashboard',[DepartmentInventory::class, 'dashboard']);
Route::get('/department/all/items',[DepartmentInventory::class, 'view_all']);
Route::get('/department/add/item',[DepartmentInventory::class, 'show_add']);
Route::post('/department/store/item',[DepartmentInventory::class, 'store_add']);
Route::get('/department/item/details/{id}',[DepartmentInventory::class, 'item_details']);
Route::get('/department/edit/item/{id}',[DepartmentInventory::class, 'edit_item']);
Route::post('/department/store/edit/item/{id}', [DepartmentInventory::class, 'store_edit']);
Route::get('/department/search/items', [DepartmentInventory::class, 'search_items']);
Route::get('/department/assign/item/{id}', [DepartmentInventory::class, 'assign']);
Route::post('/department/store/assign',[DepartmentInventory::class, 'store_assign']);
Route::get('/department/change/password',[DepartmentController::class, 'change_password']);
Route::post('/department/changing/password/{id}', [DepartmentController::class, 'changing_password']);
Route::get('/department/chat',[DepartmentChat::class, 'index']);
Route::get('/department/chat/box/{id}',[DepartmentChat::class, 'chat_box']);

//superadmin logics
Route::get('/super/admin/index',[SuperAdminController::class, 'index']);
Route::get('/super/add/admin',[SuperAdminRegistration::class, 'index']);
Route::post('/super/add/admin',[SuperAdminRegistration::class, 'store']);
Route::get('/super/admin/login',[SuperAdminLogin::class, 'show']);
Route::post('/super/admin/login',[SuperAdminLogin::class, 'login']);
Route::get('/super/admin/new/hospital',[NewHospitalController::class, 'register']);
Route::post('/super/admin/new/hospital',[NewHospitalController::class, 'store_reg']);
Route::get('/super/admin/hospital/list',[NewHospitalController::class, 'all_hospital']);
Route::get('/super/admin/hospital/details/{id}',[NewHospitalController::class, 'hospital_details']);

