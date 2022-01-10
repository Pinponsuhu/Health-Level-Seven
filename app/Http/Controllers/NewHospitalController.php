<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NewHospitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function register(){
        return view('super-admin.register');
    }

    public function store_reg(Request $request){
        $request->validate([
            'hospital_logo' => 'mimes:png,jpg,jpeg|required',
            'hospital_name' => 'required|min:2',
            'head_of_hospital' => 'required',
            'email_address' => 'required|email',
            'phone_number' => 'required|numeric',
            'hospital_address' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user = new User();
        $dest = '/public/users';
        $path = $request->file('hospital_logo')->store($dest);
        $user->hospital_name = $request->hospital_name;
        $user->head_of_hospital = $request->head_of_hospital;
        $user->email_address = $request->email_address;
        $user->phone_number = $request->phone_number;
        $user->hospital_address = $request->hospital_address;
        $user->password = Hash::make($request->password);
        $user->HID = random_int(000000000000,999999999999);
        $user->hospital_admin = 1;
        $user->hospital_logo = str_replace('public/users/','',$path);
        $user->save();
    }

    public function all_hospital(){
        $hospitals = User::latest()->paginate();
        return view('super-admin.hospital-list',['hospitals'=>$hospitals]);
    }

    public function hospital_details($id){
        $hospital = User::find($id);
        $departments = Department::where('hospital_id', '=', $id)->get();
        return view('super-admin.hospital-details',['hospital' => $hospital,'departments'=> $departments]);
    }
}
