<?php

namespace App\Http\Controllers;

use App\Charts\AppointmentChart;
use App\Charts\RegPatient;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
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
            dd('error');
        }
        return redirect('department/dashboard');
    }

    public function department_dashboard(RegPatient $chart, AppointmentChart $chart2)
    {
        $appointments = Appointment::latest()->where('hospital_id','=',Auth()->guard('department')->user()->hospital_id)->where('preferred_date','=', Carbon::now()->format('Y-m-d'))->get();
        // dd($appointments);
        return view('department.dashboard', ['appointments' => $appointments, 'chart' => $chart->build(), 'chart2' => $chart2->build()]);
    }
}

