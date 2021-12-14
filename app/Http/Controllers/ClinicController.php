<?php

namespace App\Http\Controllers;

use App\Charts\AppointmentChart;
use App\Models\Appointment;
use App\Charts\RegisteredPatient;
use App\Charts\RegPatient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function clinic_dashboard(RegPatient $chart, AppointmentChart $chart2)
    {
        $appointments = Appointment::latest()
            ->where('preferred_date','=', Carbon::now())->where('hospital_id', '=', auth()->user()->id)
            ->get();
        // dd($usermcount);
        return view('hospital.dashboard', ['appointments' => $appointments, 'chart' => $chart->build(), 'chart2' => $chart2->build()]);
    }
}
