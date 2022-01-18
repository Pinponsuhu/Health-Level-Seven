<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
    public function staff_details($id){
        $staff = Staff::find(Crypt::decrypt($id));
        if($staff->hospital_id == auth()->user()->id){
            return view('hospital.staff-details',['staff'=> $staff]);
        }else{
            return back();
        }
    }

    public function change_passport($id){
        $staff = Staff::find(Crypt::decrypt($id));
        if($staff->hospital_id == auth()->user()->id){
            return view('hospital.staff-passport',['staff'=>$staff]);
        }else{
            return redirect()->back();
        }
    }
    public function update_passport(Request $request){
        $staff = Staff::find(Crypt::decrypt($request->id));
        $path = 'storage/staffs';
        unlink($path.'/' .$staff->passport);
        $dest = '/public/staffs';
        $path = $request->file('passport')->store($dest);
        $staff->passport = str_replace('public/staffs/','',$path);
        $staff->save();
        return redirect('/hospital/dashboard');
    }
    public function delete_staff($id){
        $staff = Staff::find(Crypt::decrypt($id));
        $path = 'storage/staffs';
        unlink($path.'/' .$staff->passport);
        $staff->delete();
        return redirect('/all/staffs');
    }
    public function show_edit($id){
        $staff = Staff::find(Crypt::decrypt($id));
        $gender = array("Male","Female");
        $states = array("Abia","Adamawa","Akwa Ibom","Anambra","Bauchi","Bayelsa","Benue","Borno","Cross River","Delta","Ebonyi","Edo","Ekiti","Enugu","FCT - Abuja","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina","Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara");
        return view('hospital.edit-staff',['staff'=>$staff, 'states'=> $states,'gender'=>$gender]);
    }
    public function update_staff(Request $request){

        $request->validate([
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


        $staff = Staff::find(Crypt::decrypt($request->id));

        $staff->fullname = $request->fullname ;
        $staff->date_of_birth = $request->date_of_birth ;
        $staff->email_address = $request->email_address ;
        $staff->state_of_origin = $request->state_of_origin ;
        $staff->department = $request->department ;
        $staff->house_address = $request->resident_address ;
        $staff->gender = $request->gender;
        $staff->phone_number = $request->phone_number ;
        $staff->next_of_kin = $request->next_of_kin;
        $staff->next_of_kin_number = $request->next_of_kin_number;
        $staff->save();


        return redirect('/all/staffs');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

    public function change_password(){
        return view('hospital.change-password');
    }

    public function changing_password(Request $request){
        $this->validate($request,[
            'old_password' =>'required',
            'password' =>'required|confirmed',
        ]);
        $hospital = User::find(Crypt::decrypt($request->id));
        if($request->id == auth()->user()->id){
            if (Hash::check($request->old_password, $hospital->password)) {
                $hospital->password = Hash::make($request->password);
                $hospital->save();
                auth()->logout();
                return redirect('/login');
            }else{
                return back();
            }
        }else{
            return back();
        }
    }
}
