<?php

namespace App\Http\Controllers;

use App\Charts\BedspaceChart;
use App\Models\BedSpace;
use App\Models\Patient;
use DataTables;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function new_patient(){
        return view('hospital.new-patient');
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
        $patient = new Patient;
        $dest = '/public/patients';
        $path = $request->file('passport')->store($dest);
        $patient->surname = $request->surname ;
        $patient->othernames = $request->othernames ;
        $patient->date_of_birth = $request->date_of_birth ;
        $patient->email_address = $request->email_address ;
        $patient->state_of_origin = $request->state_of_origin ;
        $patient->occupation = $request->occupation ;
        $patient->resident_address = $request->resident_address ;
        $patient->passport = str_replace('patients/','',$path) ;
        $patient->gender = $request->gender ;
        $patient->phone_number = $request->phone_number ;
        $patient->next_of_kin = $request->next_of_kin;
        $patient->next_of_kin_number1 = $request->next_of_kin_number1;
        $patient->next_of_kin_number2 = $request->next_of_kin_number2;
        $patient->PID = random_int(1000000000,9999999999);
        $patient->save();

        return redirect()->route('clinic_dashboard');
    }

    public function bed_management(BedspaceChart $chart, Request $request){
        $beds = BedSpace::latest()
        ->where('status','!=','Released')
        ->where('status', '!=', 'Deceased')
        ->get();
$active_bed_numbers = BedSpace::latest()
        ->select('bed_number')
        ->where('status','!=','Released')
        ->where('status', '!=', 'Deceased')
        ->orderBy('id', 'ASC')
        ->get()
        ->toArray();
        $actives = array();
        // dd(count($active_bed_numbers));
        $count = count($active_bed_numbers)-1;
       for($i = 0 ; $i <= $count; $i++){
        array_push($actives,$active_bed_numbers[$i]['bed_number']);
       }
    //    $status = BedSpace::latest()->select('status')->where('status','!=','Released')
    //    ->where('status', '!=', 'Deceased')
    //    ->orderBy('id', 'ASC')
    //    ->get()
    //    ->toArray();
       $status = array("Undetermined","Good","Fair","Serious","Critical","Released","Deceased");
    //    dd($status);
      $free_bed = 50 - $beds->count();
    //    dd($actives);
    // dd($active_bed_numbers[1]);

return view('hospital.bed-management', ['chart' => $chart->build(),'beds'=> $beds, 'actives'=> $actives,'status'=> $status,'free_bed'=> $free_bed]);
    }
    public function fill_bed(){
        $active_bed_numbers = BedSpace::latest()
                ->select('bed_number')
                ->where('status','!=','Released')
                ->where('status', '!=', 'Deceased')
                ->orderBy('id', 'ASC')
                ->get()
                ->toArray();
        $actives = array();
        $count = count($active_bed_numbers)-1;
               for($i = 0 ; $i <= $count; $i++){
                array_push($actives,$active_bed_numbers[$i]['bed_number']);
               }
        return view('hospital.fill-bed',['actives'=> $actives]);
    }
    public function store_bed(Request $request){
        $request->validate([
            'surname' => 'required|min:2|alpha',
            'othernames' => 'required|min:2',
            'status' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'checked_in_date' => 'required|date',
            'checked_in_time' => 'required',
            'bed_number' => 'required',
            'ward' => 'required',
            'next_of_kin' => 'required',
            'next_of_kin_number' => 'required|numeric',
            'doctor_name' => 'required',
        ]);
        $bed = new BedSpace;

        $bed->surname = $request->surname;
        $bed->othernames = $request->othernames;
        $bed->gender = $request->gender;
        $bed->status = $request->status;
        $bed->phone_number = $request->phone_number;
        $bed->checked_in_date = $request->checked_in_date;
        $bed->checked_in_time = $request->checked_in_time;
        $bed->bed_number = $request->bed_number;
        $bed->ward = $request->ward;
        $bed->next_of_kin = $request->next_of_kin;
        $bed->next_of_kin_number = $request->next_of_kin_number;
        $bed->doctor_name = $request->doctor_name;
        $bed->PID = null;
        $bed->save();

        return redirect()->route('clinic_dashboard');
    }
    public function update_bed_space(Request $request){
        if(isset($request->bed_status)){
            $bed = BedSpace::find($request->id);
            $bed->status = $request->bed_status;
            $bed->save();

            return redirect('/bed/management');
        }
    }

    public function search(Request $request){
        $search = $request->search;
        $beds = BedSpace::latest()->where('surname', '=', $request->search)
                                  ->orWhere('othernames','=',$request->search)
                                  ->orWhere('status','=',$request->search)
                                  ->orWhere('ward','=',$request->search)
                                  ->orWhere('doctor_name','=',$request->search)
                                  ->orWhere('bed_number','=',$request->search)
                                  ->orWhere('checked_in_date','=',$request->search)->get();

        // dd($beds);
        $status = array("Undetermined","Good","Fair","Serious","Critical","Released","Deceased");
        return view('hospital.search-bed',['beds'=> $beds, 'status'=> $status,'search'=> $search]);
    }
    public function all_history(){
        $beds = BedSpace::latest()->paginate(25);
        return view('hospital.all-history',['beds'=>$beds]);
    }
    public function patient_details($id){
        $patient = Patient::find($id);
        // dd($patient);
        return view('hospital.patient-details',['patient'=> $patient]);
    }
    public function all_patient_search(Request $request){
        $patient = Patient::find($request->id);
        return view('hospital.patient-details', ['patient'=>$patient]);
        }

    public function all_patient(){
        $patients = Patient::latest()->get();
        return view('hospital.all-patient', ['patients'=> $patients]);
    }
    public function existing_patient(){
        return view('hospital.fill-existing-bed');
    }
    public function confirm_identity(Request $request){
        $patients = Patient::where('surname','=',$request->search)
                    ->orWhere('PID','=',$request->search)
                    ->get();
        // dd($patients);
        $patient_count = $patients->count();
        return view('hospital.fill-existing-bed',['patients'=> $patients,'patient_count'=> $patient_count]);
    }
    public function use_existing($id){
        $active_bed_numbers = BedSpace::latest()
        ->select('bed_number')
        ->where('status','!=','Released')
        ->where('status', '!=', 'Deceased')
        ->orderBy('id', 'ASC')
        ->get()
        ->toArray();
        $patient = Patient::find($id);
        $status = array("Undetermined","Good","Fair","Serious","Critical","Released","Deceased");
        $actives = array();
        // dd(count($active_bed_numbers));
        $count = count($active_bed_numbers)-1;
       for($i = 0 ; $i <= $count; $i++){
        array_push($actives,$active_bed_numbers[$i]['bed_number']);
       }
        return view('hospital.existing-form',['patient'=>$patient, 'actives'=> $actives]);
    }
    public function store_using_existing(Request $request){
        $patient = Patient::find($request->id)->first();
        $request->validate([
            'status' => 'required',
            'checked_in_date' => 'required|date',
            'checked_in_time' => 'required',
            'bed_number' => 'required',
            'ward' => 'required',
            'doctor_name' => 'required',
        ]);
        $bed = new BedSpace;

        $bed->surname = $request->surname;
        $bed->othernames = $request->othernames;
        $bed->gender = $request->gender;
        $bed->status = $request->status;
        $bed->phone_number = $request->phone_number;
        $bed->checked_in_date = $request->checked_in_date;
        $bed->checked_in_time = $request->checked_in_time;
        $bed->bed_number = $request->bed_number;
        $bed->ward = $request->ward;
        $bed->next_of_kin = $request->next_of_kin;
        $bed->next_of_kin_number = $request->next_of_kin_number;
        $bed->doctor_name = $request->doctor_name;
        $bed->PID = $patient->PID;
        $bed->save();

        return redirect()->route('clinic_dashboard');
    }
    public function bed_detail($id){
        $patient = BedSpace::find($id);
        return view('hospital.in-bed-details',['patient'=> $patient]);
    }
}
