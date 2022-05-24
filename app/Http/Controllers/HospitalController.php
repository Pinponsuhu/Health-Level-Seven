<?php

namespace App\Http\Controllers;

use App\Charts\BedspaceChart;
use App\Models\BedSpace;
use App\Models\Patient;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HospitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $patient->achieve = false;
        $patient->state_of_origin = $request->state_of_origin ;
        $patient->occupation = $request->occupation ;
        $patient->resident_address = $request->resident_address ;
        $patient->passport = str_replace('public/patients/','',$path) ;
        $patient->gender = $request->gender ;
        $patient->hospital_id = auth()->user()->id ;
        $patient->phone_number = $request->phone_number ;
        $patient->date_registered = Carbon::now()->format('j-F-Y');
        $patient->next_of_kin = $request->next_of_kin;
        $patient->last_edited_by = 'Admin';
        $patient->next_of_kin_number1 = $request->next_of_kin_number1;
        $patient->next_of_kin_number2 = $request->next_of_kin_number2;
        $patient->PID = random_int(1000000000,9999999999);
        $patient->save();
        return redirect()->route('clinic_dashboard');
    }

    public function change_passport(Request $request){
        $patient = Patient::find(Crypt::decrypt($request->id));
        if($patient->hospital_id == auth()->user()->id){
            return view('hospital.change-passport',['patient'=>$patient]);
        }else{
            return redirect()->back();
        }
    }

    public function update_passport(Request $request){
        $patient = Patient::find(Crypt::decrypt($request->id));
        $path = 'storage/patients';
        unlink($path.'/' .$patient->passport);
        $dest = '/public/patients';
        $path = $request->file('passport')->store($dest);
        $patient->passport = str_replace('public/patients/','',$path);
        $patient->last_edited_by = 'Admin';
        $patient->save();
        return redirect('/hospital/dashboard');
    }
    public function update_patient($id){
        $patient = Patient::find(Crypt::decrypt($id));
        if(auth()->user()->id == $patient->hospital_id){
            $gender = array("Male","Female");
            $states = array("Abia","Adamawa","Akwa Ibom","Anambra","Bauchi","Bayelsa","Benue","Borno","Cross River","Delta","Ebonyi","Edo","Ekiti","Enugu","FCT - Abuja","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina","Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara");
            return view('hospital.update-patient',['patient'=>$patient,'states'=>$states,'gender'=>$gender]);
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
            'resident_address' => 'required',
            'next_of_kin' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        $patient = Patient::find(Crypt::decrypt($request->id));
        $patient->surname = $request->surname ;
        $patient->othernames = $request->othernames ;
        $patient->date_of_birth = $request->date_of_birth ;
        $patient->email_address = $request->email_address ;
        $patient->state_of_origin = $request->state_of_origin ;
        $patient->occupation = $request->occupation ;
        $patient->resident_address = $request->resident_address ;
        $patient->gender = $request->gender ;
        $patient->phone_number = $request->phone_number ;
        $patient->next_of_kin = $request->next_of_kin;
        $patient->last_edited_by = 'Admin';
        $patient->next_of_kin_number1 = $request->next_of_kin_number1;
        $patient->next_of_kin_number2 = $request->next_of_kin_number2;
        $patient->save();
        return redirect()->route('clinic_dashboard');
    }

    public function delete_patient($id){
        $patient = Patient::find(Crypt::decrypt($id));
        $patient->achieve = true;
        $patient->save();

        return redirect('/view/all/patient');
    }

    public function bed_management(BedspaceChart $chart, Request $request){
        $beds = BedSpace::latest()
        ->where('status','!=','Released')
        ->where('status', '!=', 'Deceased')
        ->where('check_out_time', '=', null)
        ->where('hospital_id','=', auth()->user()->id)
        ->get();
$active_bed_numbers = BedSpace::latest()
        ->select('bed_number')
        ->where('status','!=','Released')
        ->where('status', '!=', 'Deceased')
        ->where('check_out_time', '=', null)
        ->where('hospital_id','=', auth()->user()->id)
        ->orderBy('id', 'ASC')
        ->get()
        ->toArray();
        $actives = array();
        $count = count($active_bed_numbers)-1;
       for($i = 0 ; $i <= $count; $i++){
            array_push($actives,$active_bed_numbers[$i]['bed_number']);
       }
        $status = array("Undetermined","Good","Fair","Serious","Critical","Released","Deceased");
        $free_bed = auth()->user()->bed_number - $beds->count();

        return view('hospital.bed-management', ['chart' => $chart->build(),'beds'=> $beds, 'actives'=> $actives,'status'=> $status,'free_bed'=> $free_bed]);
    }

    public function fill_bed(){
        $active_bed_numbers = BedSpace::latest()
                ->select('bed_number')
                ->where('status','!=','Released')
                ->where('status', '!=', 'Deceased')
                ->where('hospital_id','=', auth()->user()->id)
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
            'reason' => 'required',
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
        $bed->reason = $request->reason;
        $bed->status = $request->status;
        $bed->phone_number = $request->phone_number;
        $bed->checked_in_date = $request->checked_in_date;
        $bed->checked_in_time = $request->checked_in_time;
        $bed->bed_number = $request->bed_number;
        $bed->ward = $request->ward;
        $bed->hospital_id = auth()->user()->id;
        $bed->last_edited_by = 'Admin';
        $bed->next_of_kin = $request->next_of_kin;
        $bed->next_of_kin_number = $request->next_of_kin_number;
        $bed->doctor_name = $request->doctor_name;
        $bed->PID = null;
        $bed->save();
        return redirect()->route('clinic_dashboard');
    }

    public function update_bed_space(Request $request){
        $bed = BedSpace::find(Crypt::decrypt($request->id));
        if($bed->hospital_id == auth()->user()->id){
            if(isset($request->bed_status)){
                if($request->bed_status == "Released"){
                $bed->last_edited_by = 'Admin';
                $bed->status = $request->bed_status;
                $bed->check_out_time = Carbon::today()->toDateString();
                $bed->save();
                }else{
                    $bed->last_edited_by = 'Admin';
                    $bed->status = $request->bed_status;
                    $bed->save();
                }
                return back();
            }
        }else{
            return back();
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
                                  ->orWhere('checked_in_date','=',$request->search)
                                  ->where('hospital_id','=', auth()->user()->id)
                                  ->get();
        $status = array("Undetermined","Good","Fair","Serious","Critical","Released","Deceased");
        return view('hospital.search-bed',['beds'=> $beds, 'status'=> $status,'search'=> $search]);
    }

    public function all_history(){
        $status = array("Undetermined","Good","Fair","Serious","Critical","Released","Deceased");
        $beds = BedSpace::latest()
                    ->where('hospital_id','=', auth()->user()->id)
                    ->paginate(25);
        return view('hospital.all-history',['beds'=>$beds,'status'=>$status]);
    }

    public function patient_details($id){
        $patient = Patient::find(Crypt::decrypt($id));
        $bed_histories = BedSpace::where('PID','=',$patient->PID)->where('hospital_id','=',auth()->user()->id)->get();
        if($patient->hospital_id == auth()->user()->id){
            return view('hospital.patient-details',['patient'=> $patient,'bed_histories'=> $bed_histories]);
        }else{
            return redirect()->back();
        }
    }

    public function all_patient_search(Request $request){
        $patient = Patient::find(Crypt::decrypt($request->id));
        if($patient->hospital_id == auth()->user()->id){
        return view('hospital.patient-details', ['patient'=>$patient]);
        }else{
            return redirect()->back();
        }
    }

    public function all_patient(Request $request){
        if($request->search == ''){
            $patients = Patient::latest()
        ->where('hospital_id','=', auth()->user()->id)->where('achieve',false)
        ->get();
        return view('hospital.all-patient', ['patients'=> $patients]);
        }else{
            $patients = Patient::latest()->where('hospital_id','=', auth()->user()->id)
                                        ->where('surname', '=', $request->search)
                                        ->orWhere('PID','=',$request->search)
                                        ->orWhere('email_address','=',$request->search)
                                        ->orWhere('phone_number','=',$request->search)
                                        ->get();
            return view('hospital.all-patient',['patients'=>$patients,'search'=>$request->search]);
        }
    }

    public function archieve_patient(Request $request){
        if($request->search == ''){
            $patients = Patient::latest()
        ->where('hospital_id','=', auth()->user()->id)->where('achieve',true)
        ->paginate(15);
        return view('hospital.archieve', ['patients'=> $patients]);
        }else{
            $patients = Patient::latest()->where('hospital_id','=', auth()->user()->id)
                                        ->where('surname', '=', $request->search)
                                        ->orWhere('PID','=',$request->search)
                                        ->orWhere('email_address','=',$request->search)
                                        ->orWhere('phone_number','=',$request->search)
                                        ->paginate(15);
            return view('hospital.archieve',['patients'=>$patients,'search'=>$request->search]);
        }
    }

    public function restore_patient($id){
        $patient = Patient::find(Crypt::decrypt($id));
        $patient->achieve = false;
        $patient->save();

        return redirect()->back();
    }

    public function existing_patient(){
        return view('hospital.fill-existing-bed');
    }

    public function confirm_identity(Request $request){
        $patients = Patient::where('surname','=',$request->search)
                    ->orWhere('PID','=',$request->search)
                    ->where('hospital_id','=', auth()->user()->id)
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
        ->where('hospital_id','=', auth()->user()->id)
        ->orderBy('id', 'ASC')
        ->get()
        ->toArray();
        $patient = Patient::find(Crypt::decrypt($id));
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
        $patient = Patient::find(Crypt::decrypt($request->id))->first();
        $request->validate([
            'status' => 'required',
            'checked_in_date' => 'required|date',
            'checked_in_time' => 'required',
            'reason' => 'required',
            'bed_number' => 'required',
            'ward' => 'required',
            'doctor_name' => 'required',
        ]);
        $bed = new BedSpace;

        $bed->surname = $request->surname;
        $bed->othernames = $request->othernames;
        $bed->gender = $request->gender;
        $bed->reason = $request->reason;
        $bed->status = $request->status;
        $bed->phone_number = $request->phone_number;
        $bed->checked_in_date = $request->checked_in_date;
        $bed->checked_in_time = $request->checked_in_time;
        $bed->bed_number = $request->bed_number;
        $bed->ward = $request->ward;
        $bed->hospital_id = auth()->user()->id;
        $bed->last_edited_by = 'Admin';
        $bed->next_of_kin = $request->next_of_kin;
        $bed->next_of_kin_number = $request->next_of_kin_number;
        $bed->doctor_name = $request->doctor_name;
        $bed->PID = $patient->PID;
        $bed->save();

        return redirect()->route('clinic_dashboard');
    }

    public function bed_detail($id){
        $patient = BedSpace::find(Crypt::decrypt($id));
        if($patient->hospital_id == auth()->user()->id){
        return view('hospital.in-bed-details',['patient'=> $patient]);
        }else{
            return redirect()->back();
        }
    }
    public function delete_bed($id){
        $patient = BedSpace::find(Crypt::decrypt($id));
        if($patient->hospital_id == auth()->user()->id){
            $patient->delete();
            return redirect('/bed/management');
        }else{
            return redirect()->back();
        }
    }

}

