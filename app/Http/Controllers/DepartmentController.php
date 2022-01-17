<?php

namespace App\Http\Controllers;

use App\Charts\BedspaceChart;
use App\Models\Appointment;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('department');
    // }
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

    public function department_dashboard(BedspaceChart $chart)
    {
            $appointments = Appointment::latest()->where('hospital_id','=',Auth()->guard('department')->user()->hospital_id)->where('preferred_date','=', Carbon::now()->format('Y-m-d'))->get();
            return view('department.dashboard', ['appointments' => $appointments, 'chart' => $chart->build()]);
    }

    public function change_password(){
        return view('department.change-password');
    }

    public function changing_password(Request $request){
        $this->validate($request,[
            'old_password' =>'required',
            'password' =>'required|confirmed',
        ]);
        $department = Department::find($request->id);
        if (Hash::check($request->old_password, $department->password)) {
            $department->password = Hash::make($request->password);
            $department->save();
            Auth::guard('department')->logout();
        }
    }
}

