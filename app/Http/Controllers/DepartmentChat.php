<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentChat extends Controller
{
    public function index(){
        $departments = Department::where('hospital_id','=',auth()->guard('department')->user()->hospital_id)->get();
        return view('department.chatbox',['departments'=>$departments]);
    }

    public function chat_box($id){
        $profile = Department::find($id);
        return view('department.message-box');
    }
}
