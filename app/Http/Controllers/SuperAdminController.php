<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function index(){
        return view('super-admin.index');
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
        $user = new User;
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

    public function all_admin(){
        $admins = SuperAdmin::where('id','!=',auth()->guard('superadmin')->user()->id)
        ->where('level','!=',1)
        ->paginate(25);

        return view('super-admin.all-admin',['admins'=>$admins]);
    }

    public function admin_details($id){
        $idd = Crypt::decrypt($id);

        $admin = SuperAdmin::find($idd);
        return view('super-admin.admin-details',['admin'=>$admin]);

    }
    public function edit_admin_details($id){
        $idd = Crypt::decrypt($id);
        $gender = array('Male','Female');
        $level = array('0','1');
        $admin = SuperAdmin::find($idd);
        return view('super-admin.edit-admin',['admin'=>$admin,'gender'=>$gender,'level'=>$level]);

    }

    public function store_admin_update(Request $request){
        $this->validate($request,[
            'fullname' => 'required',
            'username' => 'required',
            'level' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email_address' => 'required|email',
        ]);

        $admin = SuperAdmin::find(Crypt::decrypt($request->id));

        $admin->fullname = $request->fullname;
        $admin->username = $request->username;
        $admin->level = $request->level;
        $admin->gender = $request->gender;
        $admin->phone_number = $request->phone_number;
        $admin->email_address = $request->email_address;
        $admin->save();

        return redirect('/super/all/admin/details/' . $request->id);
    }

    public function delete_admin($id){
        $admin = SuperAdmin::find(Crypt::decrypt($id));

        $path = 'storage/super_admins';
        unlink($path.'/' .$admin->passport);

        $admin->delete();

        return redirect('/super/admin/all/admins');
    }

    public function show_admin_password_change($id){
        $idd = Crypt::decrypt($id);
        return view('super-admin.change-admin-password',[ 'id'=> $idd]);
    }

    public function store_admin_password_change(Request $request){
            $request->validate([
                'password' => 'required|confirmed',
            ]);

            $admin = SuperAdmin::find(Crypt::decrypt($request->id));

            $admin->password = Hash::make($request->password);
            $admin->save();

            return redirect('/super/all/admin/details/' . $request->id);
    }

    public function logout(){
        auth()->guard('superadmin')->logout();
        return redirect('/super/admin/login');
    }

}
