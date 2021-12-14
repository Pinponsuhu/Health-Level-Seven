<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Notifications\AppointmentReminder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;




class routineController extends Controller
{
    public function reminder(){
        $patients = Appointment::select('email_address','surname','othernames','preferred_date')->where('preferred_date', '>', Carbon::now()->startOfWeek())
                ->where('preferred_date', '<', Carbon::now()->endOfWeek())
                ->where('hospital_id','=',auth()->user()->id)
                ->get();
                foreach($patients as $patient){
                    $email = $patient->email_address;
                    $preferred_date = $patient->preferred_date;
                    $full_name = $patient->surname . ' ' . $patient->othernames;
                \Illuminate\Support\Facades\Mail::send(new \App\Mail\ReminderMail($email, $full_name,$preferred_date));
                }
    }
}
