<?php

namespace App\Http\Controllers;

use App\Charts\AppointmentChart;
use App\Charts\BedspaceChart;
use App\Models\Appointment;
use App\Charts\RegisteredPatient;
use App\Charts\RegPatient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
