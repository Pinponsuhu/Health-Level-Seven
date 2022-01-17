<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function show_login(){
        return view('super-admin.hospital-login');
    }

    public function process_login(Request $request){
        $this->validate($request,[
            'HID'=> 'required',
            'password'=> 'required'
        ]);
        if(!auth()->attempt($request->only('HID','password'))){
                return back()->with('status','Invalid login credentials');
        }
            return redirect('/hospital/dashboard');
    }
}
