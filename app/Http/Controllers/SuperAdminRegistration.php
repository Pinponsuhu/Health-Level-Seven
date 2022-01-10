<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminRegistration extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function index(){
        return view('super-admin.reg-admin');
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'passport' => 'required','mimes:png,jpg,jpeg',
            'fullname' => 'required',
            'username' => 'required',
            'level' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email_address' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $sup = new SuperAdmin;
        $dest = '/public/super_admins';
        $path = $request->file('passport')->store($dest);

        $sup->fullname = $request->fullname;
        $sup->username = $request->username;
        $sup->level = $request->level;
        $sup->gender = $request->gender;
        $sup->phone_number = $request->phone_number;
        $sup->email_address = $request->email_address;
        $sup->passport = str_replace('public/super_admins/','',$path);
        $sup->password = Hash::make($request->password);
        $sup->save();

        return redirect('/super/admin/index');
    }
}
