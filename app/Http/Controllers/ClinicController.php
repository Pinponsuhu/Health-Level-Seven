<?php

namespace App\Http\Controllers;

use App\Charts\AppointmentChart;
use App\Models\Appointment;
use App\Charts\RegisteredPatient;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function clinic_dashboard(RegisteredPatient $chart, AppointmentChart $chart2){
        $appointments = Appointment::latest()->where('preferred_date','=',date('Y-m-d'))->get();
        return view('hospital.dashboard', ['appointments' => $appointments,'chart' => $chart->build(), 'chart2' => $chart2->build()]);
    }
}
