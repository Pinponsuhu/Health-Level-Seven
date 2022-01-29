<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentAuthController extends Controller
{
    public function show_login(){
        return view('department.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'password' => 'required'
        ]);
        if(!Auth::guard('department')->attempt($request->only('name','password'))){
            return back();
        }
        return redirect('department/dashboard');
    }
}
