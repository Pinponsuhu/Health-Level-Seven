<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HospitalAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function overview(){
        $department = Department::where('hospital_id','=',auth()->user()->id)->count();
        $staff = Staff::where('hospital_id','=',auth()->user()->id)->count();
        return view('hospital.admin',['department'=>$department,'staff'=>$staff]);
    }

    public function add_department(){
        return view('hospital.add-department');
    }

    public function store_department(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed'
        ]);
        $department = new Department;

        $department->name = $request->name;
        $department->password = Hash::make($request->password);
        $department->radiology_permission = $request->radiology;
        $department->bed_permission = $request->bed;
        $department->hospital_id = auth()->user()->id;
        $department->hospital_name = auth()->user()->hospital_name;
        $department->hospital_logo = auth()->user()->hospital_logo;
        $department->HID = auth()->user()->HID;
        $department->appointment_permission = $request->appointment;
        $department->inventory_permission = $request->inventory;
        $department->save();
        return redirect('/hospital/dashboard');
    }

    public function login(){
        return view('hospital.department-login');
    }

    public function sign_in(Request $request){
        if(Auth::guard('department')->attempt($request->only('name','password'))){
            dd('dady');
        }
        dd('shaba');
    }

    public function staff_form(){
        return view('hospital.staff-registration');
    }

    public function store_staff(Request $request){
        $request->validate([
            'passport' => 'mimes:png,jpg,jpeg|required',
            'fullname' => 'required|min:2',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'state_of_origin' => 'required',
            'email_address' => 'required|email',
            'department' => 'required',
            'resident_address' => 'required',
            'next_of_kin' => 'required',
            'next_of_kin_number' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        $staff = new Staff;
        $dest = '/public/staffs';
        $path = $request->file('passport')->store($dest);
        $staff->fullname = $request->fullname ;
        $staff->date_of_birth = $request->date_of_birth ;
        $staff->email_address = $request->email_address ;
        $staff->state_of_origin = $request->state_of_origin ;
        $staff->department = $request->department ;
        $staff->house_address = $request->resident_address ;
        $staff->passport = str_replace('public/staffs/','',$path) ;
        $staff->gender = $request->gender ;
        $staff->hospital_id = auth()->user()->id ;
        $staff->phone_number = $request->phone_number ;
        $staff->next_of_kin = $request->next_of_kin;
        $staff->next_of_kin_number = $request->next_of_kin_number;
        $staff->staff_id = random_int(00000000,99999999);
        $staff->save();
        return redirect('/hospital/dashboard');
    }

    public function all_staff(){
        $staffs = Staff::latest()
        ->where('hospital_id','=', auth()->user()->id)
        ->paginate(25);
        return view('hospital.all-staffs',['staffs'=>$staffs]);
    }
    
    public function all_department(){
        $departments = Department::latest()
        ->where('hospital_id','=', auth()->user()->id)
        ->paginate(25);
        return view('hospital.all-departments',['departments'=>$departments]);
    }
}
