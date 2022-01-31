<?php

namespace App\Http\Controllers;

use App\Charts\AppointmentChart;
use App\Charts\BedspaceChart;
use App\Models\Appointment;
use App\Charts\RegisteredPatient;
use App\Charts\RegPatient;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ClinicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function clinic_dashboard(BedspaceChart $chart, AppointmentChart $chart2)
    {
        $appointments = Appointment::latest()->where('hospital_id','=',auth()->user()->id)->where('preferred_date','=', Carbon::now()->format('Y-m-d'))->get();
        return view('hospital.dashboard', ['appointments' => $appointments, 'chart' => $chart->build(), 'chart2' => $chart2->build()]);
    }

    public function covid_tracker(){
        return view('hospital.covid-tracker.index');
    }
    public function department_details($id){
        $department = Department::find(Crypt::decrypt($id));

        return view('hospital.department-details',['department'=> $department]);
    }

    public function edit_department_password($id){
        return view('hospital.edit-department-password',['id'=> $id]);
    }

    public function update_department_password(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $department = Department::find(Crypt::decrypt($request->id));

        $department->password = Hash::make($request->password);
        $department->save();

        return redirect('/all/departments');
    }

    public function edit_department($id){
        $department = Department::find(Crypt::decrypt($id));
        return view('hospital.edit-department',['department'=> $department]);
    }

    public function update_department(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $department = Department::find(Crypt::decrypt($request->id));

        $department->name = $request->name;
        $department->radiology_permission = $request->radiology;
        $department->bed_permission = $request->bed;
        $department->appointment_permission = $request->appointment;
        $department->inventory_permission = $request->inventory;
        $department->save();

        return redirect('/all/departments');
    }

    public function delete_department($id){
        $department = Department::find(Crypt::decrypt($id));

        $department->delete();

        return redirect('/all/departments');
    }
}
