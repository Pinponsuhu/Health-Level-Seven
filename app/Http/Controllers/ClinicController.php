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
            ->where('preferred_date', '=', date('Y-m-d'))->where('hospital_id', '=', auth()->user()->id)
            ->get();
        $users = User::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $usermcount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($usermcount[$i])) {
                $userArr[$i] = $usermcount[$i];
            } else {
                $userArr[$i] = 0;
            }
        }
        // dd($usermcount);
        return view('hospital.dashboard', ['appointments' => $appointments, 'chart' => $chart->build(), 'chart2' => $chart2->build()]);
    }
}
