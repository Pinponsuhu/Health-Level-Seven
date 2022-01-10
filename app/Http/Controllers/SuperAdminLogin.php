<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminLogin extends Controller
{
    public function show(){
        return view('super-admin.login');
    }
    
    public function login(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);
        if(!Auth::guard('superadmin')->attempt($request->only('username','password'))){
            return back();
        }
        return redirect('super/admin/index');
    }
}
