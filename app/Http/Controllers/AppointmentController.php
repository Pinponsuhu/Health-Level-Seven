<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function book(){
        return view('hospital.book-appointment');
    }
    public function telephone(){
        $appointments = Appointment::latest()->where('appointment_type','=','Telephone Consultancy')
        ->where('hospital_id','=', auth()->user()->id)->paginate(16);

        return view('hospital.telephone-appointment',['appointments'=>$appointments]);
    }
    public function routine(){
        $appointments = Appointment::where('appointment_type','=','Pre-booked')
        ->where('hospital_id','=', auth()->user()->id)->paginate(20);
        return view('hospital.routine',['appointments'=>$appointments]);
    }
    public function store_bookings(Request $request){
        $request->validate([
            'surname' => 'required|min:2|alpha',
            'othernames' => 'required|min:2',
            'gender' => 'required',
            'preferred_date' => 'required',
            'doctor_type' => 'required',
            'appointment_type' => 'required',
            'email_address' => 'required|email',
            'phone_number' => 'required|numeric',
        ]);
        $appointments = new Appointment;
        $appointments->surname = $request->surname ;
        $appointments->othernames = $request->othernames ;
        $appointments->preferred_date = $request->preferred_date ;
        $appointments->email_address = $request->email_address ;
        $appointments->gender = $request->gender ;
        $appointments->appointment_type = $request->appointment_type ;
        $appointments->doctor_type = $request->doctor_type ;
        $appointments->hospital_id = auth()->user()->id;
        $appointments->phone_number = $request->phone_number ;
        $appointments->status = 'Active' ;
        $appointments->save();

        return redirect()->route('clinic_dashboard');
    }
}
