<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DepartmentAppointment;
use App\Http\Controllers\DepartmentAuthController;
use App\Http\Controllers\DepartmentBed;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentInventory;
use App\Http\Controllers\DepartmentPatient;
use App\Http\Controllers\DepartmentRadiology;
use App\Http\Controllers\DepartmentRequest;
use App\Http\Controllers\HospitalAdminController;
use App\Http\Controllers\HospitalComplaintController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\HospitalDataExchange;
use App\Http\Controllers\HospitalLoginController;
use App\Http\Controllers\HospitalRequestController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\NewHospitalController;
use App\Http\Controllers\RadiologyController;
use App\Http\Controllers\routineController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdminLogin;
use App\Http\Controllers\SuperAdminRegistration;
use App\Http\Controllers\UserControler;
use App\Models\Appointment;
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
Route::get('/logout', [HospitalAdminController::class, 'logout']);
Route::get('/hospital/department/details/{id}',[ClinicController::class, 'department_details']);
Route::get('/hospital/change/password/department/{id}',[ClinicController::class, 'edit_department_password']);
Route::post('/hospital/change/password/department/{id}',[ClinicController::class, 'update_department_password']);
Route::get('/hospital/delete/department/{id}', [ClinicController::class, 'delete_department']);
Route::get('/hospital/edit/department/{id}',[ClinicController::class, 'edit_department']);
Route::post('/hospital/edit/department/{id}',[ClinicController::class, 'update_department']);
Route::post('/super/admin/store/new',[SuperAdminController::class, 'store_reg']);
Route::get('/hospital/dashboard', [ClinicController::class, 'clinic_dashboard'])->name('clinic_dashboard');
Route::get('/hospital/new/patient', [HospitalController::class, 'new_patient']);
Route::post('/save/patient', [HospitalController::class, 'store_patient'])->name('store_patient');
Route::get('/change-passport/{id}', [HospitalController::class, 'change_passport']);
Route::post('/store/update/{id}', [HospitalController::class, 'update_passport']);
Route::get('/staff/change/passport/{id}',[HospitalAdminController::class, 'change_passport']);
Route::post('/staff/store/update/{id}',[HospitalAdminController::class, 'update_passport']);
Route::get('/update/patient/{id}',[HospitalController::class, 'update_patient']);
Route::post('/save/patient/update/{id}',[HospitalController::class, 'store_patient_update']);
Route::get('/bed/management', [HospitalController::class, 'bed_management']);
Route::get('/fill/bed', [HospitalController::class, 'fill_bed']);
Route::post('/update/bed/{id}',[HospitalController::class, 'update_bed_space']);
Route::get('/bed/history',[HospitalController::class, 'all_history']);
Route::get('/delete/bed/details/{id}', [HospitalController::class, 'delete_bed']);
Route::get('/view/all/patient/action',[HospitalController::class, 'all_patient_search']);
Route::get('/view/all/patient',[HospitalController::class, 'all_patient']);
Route::get('/view/archieve/patient',[HospitalController::class, 'archieve_patient']);
Route::get('/restore/patient/details/{id}',[HospitalController::class, 'restore_patient']);
Route::get('/delete/patient/{id}',[HospitalController::class, 'delete_patient']);
Route::get('/patient/details/{id}',[HospitalController::class, 'patient_details']);
Route::post('/bed/space', [HospitalController::class, 'store_bed']);
Route::get('/bed/search', [HospitalController::class, 'search']);
Route::get('/bed/detail/{id}', [HospitalController::class, 'bed_detail']);
Route::get('/fill/existing/patient', [HospitalController::class, 'existing_patient']);
Route::get('/confirm/patient',[HospitalController::class, 'confirm_identity']);
Route::get('/use/existing/{id}', [HospitalController::class, 'use_existing']);
Route::post('/existing/store/{id}', [HospitalController::class,'store_using_existing']);
Route::get('/book/appointment', [AppointmentController::class, 'book']);
Route::get('/prebooked/appointment/{stat}', [AppointmentController::class, 'prebooked']);
Route::post('/update/appointment/{id}', [AppointmentController::class, 'update_status']);
Route::get('/routine/appointment/{stat}', [AppointmentController::class, 'routine']);
Route::get('/telephone/appointments/{stat}',[AppointmentController::class, 'telephone']);
Route::get('/today/appointments/{stat}',[AppointmentController::class, 'today_appointment']);
Route::post('/store/appointment', [AppointmentController::class, 'store_bookings'])->name('store_bookings');
Route::get('/inventory/dashboard', [InventoryController::class, 'dashboard']);
Route::get('/add/item', [InventoryController::class, 'show_add']);
Route::post('/store/item', [InventoryController::class, 'store_add']);
Route::get('/delete/item/{id}', [InventoryController::class, 'delete_item']);
Route::get('/all/items', [InventoryController::class, 'view_all']);
Route::get('/item/details/{id}', [InventoryController::class, 'item_details']);
Route::get('/assign/item/{id}', [InventoryController::class, 'assign']);
Route::post('/store/assign/{id}', [InventoryController::class, 'store_assign']);
Route::get('/edit/item/{id}', [InventoryController::class, 'edit_item']);
Route::post('/store/edit/item/{id}', [InventoryController::class, 'store_edit']);
Route::get('/search/items',[InventoryController::class, 'search_items']);
Route::get('/send/reminder', [routineController::class, 'reminder']);
Route::get('/hospital/changing/password',[HospitalAdminController::class, 'change_password']);
Route::post('/hospital/changing/password/{id}',[HospitalAdminController::class, 'changing_password']);
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
Route::get('/edit/staff/{id}', [HospitalAdminController::class, 'show_edit']);
Route::post('/edit/staff/{id}', [HospitalAdminController::class, 'update_staff']);
Route::get('/delete/staff/{id}', [HospitalAdminController::class, 'delete_staff']);
Route::get('/all/staffs',[HospitalAdminController::class, 'all_staff']);
Route::get('/delete/radiology/file/{id}',[RadiologyController::class, 'delete_file']);
Route::get('/staff/details/{id}',[HospitalAdminController::class, 'staff_details']);
Route::get('/all/departments',[HospitalAdminController::class, 'all_department']);
Route::get('/department/login',[HospitalAdminController::class, 'login']);
Route::post('/department/login',[HospitalAdminController::class, 'sign_in']);
Route::get('/hospital/data/exchange',[HospitalDataExchange::class , 'show']);
Route::get('/dataex/send/message/{id}',[HospitalDataExchange::class, 'get_msg']);
Route::get('/hospital/{status}/complain/',[HospitalComplaintController::class, 'all_complaint']);
Route::get('hospital/new/complaint',[HospitalComplaintController::class, 'show_complaint']);
Route::post('hospital/new/complaint',[HospitalComplaintController::class, 'store_complaint']);
Route::get('/hospital/complain/track/{id}',[HospitalComplaintController::class, 'track_complaint']);
Route::get('/hospital/reply/complain/{id}',[HospitalComplaintController::class, 'show_reply_complaint']);
Route::post('/hospital/reply/complain/{id}',[HospitalComplaintController::class, 'send_reply_complaint']);
Route::get('/hospital/dataex/send',[HospitalDataExchange::class, 'send_msg']);
//testing file
Route::post('/hospital/datex/send', [HospitalDataExchange::class, 'send_file']);
//request controller
Route::get('/request/{status}',[HospitalRequestController::class, 'show']);
Route::get('/request/track/{id}',[HospitalRequestController::class, 'track']);
Route::get('/reply/request/{id}',[HospitalRequestController::class, 'show_reply']);
Route::post('/reply/request/{id}',[HospitalRequestController::class, 'send_reply']);
Route::get('/hospital/covid/tracker', [ClinicController::class, 'covid_tracker']);

//Department logics
Route::get('/department/login',[DepartmentAuthController::class,'show_login']);
Route::post('/department/login',[DepartmentAuthController::class, 'login']);
Route::get('/department/dashboard',[DepartmentController::class, 'department_dashboard'])->middleware('department');
Route::get('/department/add/radiology',[DepartmentRadiology::class, 'show_form'])->middleware('department');
Route::post('/department/upload/radiology',[DepartmentRadiology::class, 'store_credentials']);
Route::get('/department/track/uploads',[DepartmentRadiology::class,'track_uploads'])->middleware('department');
Route::get('/department/upload/details/{id}',[DepartmentRadiology::class, 'upload_details']);
Route::post('/department/add/result/{id}',[DepartmentRadiology::class, 'add_result']);
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
Route::get('/department/routine/appointment/{stat}', [DepartmentAppointment::class, 'routine']);
Route::get('/department/prebooked/appointment/{stat}', [DepartmentAppointment::class, 'prebooked']);
Route::get('/department/telephone/appointments/{stat}', [DepartmentAppointment::class, 'telephone']);
Route::get('/department/today/appointments/{stat}',[DepartmentAppointment::class, 'today_appointment']);
Route::post('/department/update/appointment/{id}', [DepartmentAppointment::class, 'update_status']);
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
Route::get('/department/request/{status}',[DepartmentRequest::class, 'show']);
Route::get('/department/new/request',[DepartmentRequest::class, 'show_add']);
Route::post('/department/new/request',[DepartmentRequest::class, 'store_new']);
Route::get('/department/request/track/{id}',[DepartmentRequest::class, 'req_details']);
Route::get('department/reply/request/{id}',[DepartmentRequest::class, 'show_reply']);
Route::post('department/reply/request/{id}',[DepartmentRequest::class, 'send_reply']);
Route::get('/department/covid/tracker',[DepartmentController::class, 'covid_tracker']);
Route::get('/department/logout',[DepartmentController::class, 'logout']);

//superadmin logics
Route::get('/super/admin/index',[SuperAdminController::class, 'index']);
Route::get('/super/add/admin',[SuperAdminRegistration::class, 'index']);
Route::post('/super/add/admin',[SuperAdminRegistration::class, 'store']);
Route::get('/super/admin/login',[SuperAdminLogin::class, 'show']);
Route::post('/super/admin/login',[SuperAdminLogin::class, 'login']);
Route::get('/super/admin/new/hospital',[NewHospitalController::class, 'register']);
Route::post('/super/admin/new/hospital',[NewHospitalController::class, 'store_reg']);
Route::get('/super/admin/hospital/list',[NewHospitalController::class, 'all_hospital']);
Route::get('/super/admin/hospital/search',[NewHospitalController::class, 'hospital_search']);
Route::get('/super/admin/hospital/details/{id}',[NewHospitalController::class, 'hospital_details']);
Route::get('/super/admin/settings',[SuperAdminController::class, 'setting']);
Route::get('/super/admin/all/admins',[SuperAdminController::class, 'all_admin']);
Route::get('/super/all/admin/details/{id}',[SuperAdminController::class, 'admin_details']);
Route::get('/super/admin/edit/{id}', [SuperAdminController::class, 'edit_admin_details']);
Route::get('/super/admin/change/passport/{id}',[SuperAdminController::class, 'change_passport']);
Route::post('/super/admin/change/passport/{id}',[SuperAdminController::class, 'update_admin_passport']);
Route::post('/super/admin/edit/{id}', [SuperAdminController::class, 'store_admin_update']);
Route::get('//super/admin/delete/{id}',[SuperAdminController::class, 'delete_admin']);
Route::get('/super/admin/password/{id}', [SuperAdminController::class, 'show_admin_password_change']);
Route::post('/super/admin/password/{id}', [SuperAdminController::class, 'store_admin_password_change']);
Route::get('/super/admin/settings', [SuperAdminController::class, 'show_settings']);
Route::get('/super/admin/settings/change/passport', [SuperAdminController::class, 'show_passport_change']);
Route::get('/super/admin/settings/change/password', [SuperAdminController::class, 'show_password_change']);
Route::get('/super/admin/settings/update/profile', [SuperAdminController::class, 'edit_my_profile']);
Route::post('/super/admin/settings/update/profile', [SuperAdminController::class, 'update_my_profile']);
Route::post('/super/admin/settings/change/passport', [SuperAdminController::class, 'store_admin_new_passport']);
Route::post('/super/admin/settings/change/password', [SuperAdminController::class, 'store_admin_new_password']);
Route::get('/super/admin/edit/hospital/{id}',[SuperAdminController::class, 'edit_hospital']);
Route::get('/super/admin/edit/department/{id}',[SuperAdminController::class, 'edit_department']);
Route::post('/super/admin/edit/department/{id}',[SuperAdminController::class, 'update_department']);
Route::post('/super/admin/edit/hospital/{id}',[SuperAdminController::class, 'store_edited_hospital']);
Route::get('/super/admin/change/logo/{id}',[SuperAdminController::class, 'change_logo']);
Route::post('/super/admin/change/logo/{id}',[SuperAdminController::class, 'update_logo']);
Route::get('/super/hospital/delete/{id}',[SuperAdminController::class, 'delete_hospital']);
Route::get('//super/hospital/change/password/{id}',[SuperAdminController::class, 'change_hospital_password']);
Route::post('//super/hospital/change/password/{id}',[SuperAdminController::class, 'update_hospital_password']);
Route::get('/super/admin/logout', [SuperAdminController::class, 'logout']);
Route::get('/super/{status}/complaint',[SuperAdminController::class, 'all_complain']);
Route::get('/super/complain/track/{id}',[SuperAdminController::class, 'track_complaint']);
Route::get('super/reply/complain/{id}',[SuperAdminController::class, 'show_reply_complain']);
Route::post('/super/reply/complain/{id}',[SuperAdminController::class, 'send_reply_complaint']);
Route::get('/super/admin/department/password/{id}',[SuperAdminController::class, 'edit_department_password']);
Route::post('/super/admin/department/password/{id}',[SuperAdminController::class, 'update_department_password']);
Route::get('/super/admin/delete/department/{id}',[SuperAdminController::class, 'delete_department']);


//reidrect link

Route::redirect('/', '/login', 301);
