<?php

namespace App\Http\Controllers;

use App\Charts\DepartmentBedChart;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('department');
    }

    public function department_dashboard(DepartmentBedChart $chart)
    {
        // dd($bed_no);
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
        $department = Department::find(Crypt::decrypt($request->id));
        if (Hash::check($request->old_password, $department->password)) {
            $department->password = Hash::make($request->password);
            $department->save();
            Auth::guard('department')->logout();
        }else{
            return back();
        }
    }

    public function covid_tracker(){
        return view('department.covid-tracker.index');
    }

    public function logout(){
        auth()->guard('department')->logout();
        return redirect('/department/login');
    }
}

