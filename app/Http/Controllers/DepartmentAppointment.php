<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DepartmentAppointment extends Controller
{
    public function __construct()
    {
        $this->middleware(['appt','department']);
    }

    public function book(){
        return view('department.book-appointment');
    }

    public function telephone($stat){
        $status = array('Active','Cancelled','Missed','Postpone');
        if(Crypt::decrypt($stat) == 'Active'){
        $appointments = Appointment::where('appointment_type','=','Telephone Consultancy')
        ->where('hospital_id','=', auth()->guard('department')->user()->id)
        ->where('status','Active')
        ->paginate(20);
        $statuss = 'Active';
        return view('department.telephone-appointment',['appointments'=>$appointments,'status'=>$status, 'statuss' => $statuss]);
        }elseif( Crypt::decrypt($stat) == 'Cancelled'){
            $appointments = Appointment::where('appointment_type','=','Telephone Consultancy')
            ->where('hospital_id','=', auth()->guard('department')->user()->id)
            ->where('status','Cancelled')
            ->paginate(20);
            $statuss = 'Cancelled';
            return view('department.telephone-appointment',['appointments'=>$appointments,'status'=>$status, 'statuss' => $statuss]);
        }else{
            $appointments = Appointment::where('appointment_type','=','Telephone Consultancy')
            ->where('hospital_id','=', auth()->guard('department')->user()->id)
            ->where('status','Missed')
            ->paginate(20);
            $statuss = 'Missed';
            return view('department.telephone-appointment',['appointments'=>$appointments,'status'=>$status, 'statuss' => $statuss]);
        }
    }

    public function prebooked($stat){
        $status = array('Active','Cancelled','Missed','Postpone');
        if(Crypt::decrypt($stat) == 'Active'){
        $appointments = Appointment::where('appointment_type','=','Pre-booked')
        ->where('hospital_id','=', auth()->guard('department')->user()->id)
        ->where('status','Active')
        ->paginate(20);
        $statuss = 'Active';
        return view('department.prebooked',['appointments'=>$appointments,'status'=>$status, 'statuss' => $statuss]);
        }elseif( Crypt::decrypt($stat) == 'Cancelled'){
            $appointments = Appointment::where('appointment_type','=','Pre-booked')
            ->where('hospital_id','=', auth()->guard('department')->user()->id)
            ->where('status','Cancelled')
            ->paginate(20);
            $statuss = 'Cancelled';
            return view('department.prebooked',['appointments'=>$appointments,'status'=>$status, 'statuss' => $statuss]);
        }else{
            $appointments = Appointment::where('appointment_type','=','Pre-booked')
            ->where('hospital_id','=', auth()->guard('department')->user()->id)
            ->where('status','Missed')
            ->paginate(20);
            $statuss = 'Missed';
            return view('department.prebooked',['appointments'=>$appointments,'status'=>$status, 'statuss' => $statuss]);
        }
    }

    public function routine($stat){
        $status = array('Active','Cancelled','Missed','Postpone');
        if(Crypt::decrypt($stat) == 'Active'){
        $appointments = Appointment::where('appointment_type','=','Routine')
        ->where('hospital_id','=', auth()->guard('department')->user()->id)
        ->where('status','Active')
        ->paginate(20);
        $statuss = 'Active';
        return view('department.routine',['appointments'=>$appointments,'status'=>$status, 'statuss' => $statuss]);
        }elseif( Crypt::decrypt($stat) == 'Cancelled'){
            $appointments = Appointment::where('appointment_type','=','Routine')
            ->where('hospital_id','=', auth()->guard('department')->user()->id)
            ->where('status','Cancelled')
            ->paginate(20);
            $statuss = 'Cancelled';
            return view('department.routine',['appointments'=>$appointments,'status'=>$status, 'statuss' => $statuss]);
        }else{
            $appointments = Appointment::where('appointment_type','=','Routine')
            ->where('hospital_id','=', auth()->guard('department')->user()->id)
            ->where('status','Missed')
            ->paginate(20);
            $statuss = 'Missed';
            return view('department.routine',['appointments'=>$appointments,'status'=>$status, 'statuss' => $statuss]);
        }
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
        $appointments = new Appointment();
        $appointments->surname = $request->surname ;
        $appointments->othernames = $request->othernames ;
        $appointments->preferred_date = $request->preferred_date ;
        $appointments->email_address = $request->email_address ;
        $appointments->gender = $request->gender ;
        $appointments->appointment_type = $request->appointment_type ;
        $appointments->doctor_type = $request->doctor_type ;
        $appointments->hospital_id = auth()->guard('department')->user()->hospital_id;
        $appointments->last_edited_by = auth()->guard('department')->user()->name;
        $appointments->phone_number = $request->phone_number ;
        $appointments->status = 'Active' ;
        $appointments->save();

        return redirect('department/dashboard');
    }

    public function update_status(Request $request){
        $appointment = Appointment::find(Crypt::decrypt($request->id));
        $date = $appointment->preferred_date;
        if($appointment->hospital_id == auth()->guard('department')->user()->hospital_id){
                if($request->status == 'Postpone'){
                $appointment->last_edited_by = auth()->guard('department')->user()->name;
                $appointment->status = 'Active';
                $appointment->preferred_date = Carbon::parse($date)->addDays(07);
                $appointment->save();
                return back();
                }
                else{
                    $appointment->last_edited_by = 'Admin';
                    $appointment->status = auth()->guard('department')->user()->name;
                    $appointment->save();
                    return back();
                }
        }else{
            return back();
        }
    }
}
