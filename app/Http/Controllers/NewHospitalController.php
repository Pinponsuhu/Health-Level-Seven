<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
            'email_address' => 'required|unique:users,email_address|email',
            'phone_number' => 'required|numeric|unique:users,phone_number',
            'bed_number' => 'required|numeric',
            'shelf_number' => 'required|numeric',
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
        $user->shelf_number = $request->shelf_number;
        $user->bed_number = $request->bed_number;
        $user->hospital_address = $request->hospital_address;
        $user->password = Hash::make($request->password);
        $user->HID = random_int(000000000000,999999999999);
        $user->hospital_admin = 1;
        $user->hospital_logo = str_replace('public/users/','',$path);
        $user->save();

        return redirect('/super/admin/index');
    }

    public function all_hospital(Request $request){
        // $request->validate([
        //     'email' => 'unique:table,column,except,id'
        // ])

        $hospitals = User::latest()->paginate(15);
        return view('super-admin.hospital-list',['hospitals'=>$hospitals]);
    }

    public function hospital_search(Request $request){
        // dd('shaba');
        $request->validate([
            'search' => 'required'
        ]);

        $hospital = User::where('hospital_name', $request->search)->orWhere('HID',$request->search)->first();
        // dd($hospital);

        return view('super-admin.search-hospital',['hospital' => $hospital]);
    }

    public function hospital_details($id){
        $hospital = User::find(Crypt::decrypt($id));
        $departments = Department::where('hospital_id', '=', Crypt::decrypt($id))->get();
        return view('super-admin.hospital-details',['hospital' => $hospital,'departments'=> $departments]);
    }
}
