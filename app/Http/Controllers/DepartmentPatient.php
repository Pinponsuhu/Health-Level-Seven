<?php

namespace App\Http\Controllers;

use App\Models\BedSpace;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartmentPatient extends Controller
{
    public function __construct()
    {
        $this->middleware(['pat']);
    }
    public function new_patient(){
        return view('department.new-patient');
    }
    public function store_patient(Request $request){
        $request->validate([
            'passport' => 'mimes:png,jpg,jpeg|required',
            'surname' => 'required|min:2|alpha',
            'othernames' => 'required|min:2',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'state_of_origin' => 'required',
            'email_address' => 'required|email',
            'occupation' => 'required',
            'resident_address' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        $patient = new Patient();
        $dest = '/public/patients';
        $path = $request->file('passport')->store($dest);
        $patient->surname = $request->surname ;
        $patient->othernames = $request->othernames ;
        $patient->date_of_birth = $request->date_of_birth ;
        $patient->email_address = $request->email_address ;
        $patient->state_of_origin = $request->state_of_origin ;
        $patient->occupation = $request->occupation ;
        $patient->resident_address = $request->resident_address ;
        $patient->passport = str_replace('public/patients/','',$path) ;
        $patient->gender = $request->gender ;
        $patient->hospital_id = auth()->guard('department')->user()->hospital_id ;
        $patient->phone_number = $request->phone_number ;
        $patient->date_registered = Carbon::now()->format('j-F-Y');
        $patient->next_of_kin = $request->next_of_kin;
        $patient->next_of_kin_number1 = $request->next_of_kin_number1;
        $patient->last_edited_by = auth()->guard('department')->user()->name;
        $patient->next_of_kin_number2 = $request->next_of_kin_number2;
        $patient->PID = random_int(1000000000,9999999999);
        $patient->save();

        return redirect('/department/dashboard');
    }
    public function change_passport(Request $request){
        $patient = Patient::find($request->id);
        if($patient->hospital_id == auth()->guard('department')->user()->hospital_id){
            // dd($patient);
            return view('department.change-passport',['patient'=>$patient]);
        }else{
            return redirect()->back();
        }
            }
    public function update_passport(Request $request){
        $patient = Patient::find($request->id);
        $path = 'storage/patients';
        unlink($path.'/' .$patient->passport);
        $dest = '/public/patients';
        $path = $request->file('passport')->store($dest);
        $patient->passport = str_replace('public/patients/','',$path);
        $patient->last_edited_by = auth()->guard('department')->user()->name;
        $patient->save();

        return redirect('/department/dashboard');
    }
    public function update_patient($id){
        $patient = Patient::find($id);
        if(auth()->guard('department')->user()->hospital_id == $patient->hospital_id){
            $gender = array("Male","Female");
            $states = array("Abia","Adamawa","Akwa Ibom","Anambra","Bauchi","Bayelsa","Benue","Borno","Cross River","Delta","Ebonyi","Edo","Ekiti","Enugu","FCT - Abuja","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina","Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara");
            return view('department.update-patient',['patient'=>$patient,'states'=>$states,'gender'=>$gender]);
        }
    }

    public function store_patient_update(Request $request){
        $request->validate([
            'surname' => 'required|min:2|alpha',
            'othernames' => 'required|min:2',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'state_of_origin' => 'required',
            'email_address' => 'required|email',
            'occupation' => 'required',
            'next_of_kin' => 'required',
            'next_of_kin_number1' => 'required',
            'resident_address' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        $patient = Patient::find($request->id);
        $patient->surname = $request->surname ;
        $patient->othernames = $request->othernames ;
        $patient->date_of_birth = $request->date_of_birth ;
        $patient->email_address = $request->email_address ;
        $patient->last_edited_by = auth()->guard('department')->user()->name;
        $patient->state_of_origin = $request->state_of_origin ;
        $patient->occupation = $request->occupation ;
        $patient->resident_address = $request->resident_address ;
        $patient->gender = $request->gender ;
        $patient->phone_number = $request->phone_number ;
        $patient->next_of_kin = $request->next_of_kin;
        $patient->next_of_kin_number1 = $request->next_of_kin_number1;
        $patient->next_of_kin_number2 = $request->next_of_kin_number2;
        $patient->save();
        return redirect('/department/dashboard');
    }
    public function patient_details($id){
        $patient = Patient::find($id);
        $bed_histories = BedSpace::where('PID','=',$patient->PID)->where('hospital_id','=',auth()->user()->id)->get();
        if($patient->hospital_id == auth()->guard('department')->user()->hospital_id){
            return view('department.patient-details',['patient'=> $patient,'bed_histories'=> $bed_histories]);
        }else{
            return redirect()->back();
        }
        // dd($patient);
    }
    public function all_patient_search(Request $request){
        $patient = Patient::find($request->id);
        if($patient->hospital_id == auth()->guard('department')->user()->hospital_id){
        return view('department.patient-details', ['patient'=>$patient]);
        }else{
            return redirect()->back();
        }
    }

    public function all_patient(){
        $patients = Patient::latest()
        ->where('hospital_id','=', auth()->guard('department')->user()->hospital_id)
        ->get();
        return view('department.all-patient', ['patients'=> $patients]);
    }
}
