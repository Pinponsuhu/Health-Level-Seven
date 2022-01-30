<?php

namespace App\Http\Controllers;

use App\Charts\BedspaceChart;
use App\Charts\DepartmentBedChart;
use App\Models\BedSpace;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DepartmentBed extends Controller
{
    public function __construct()
    {
        $this->middleware('bed');
    }

    public function bed_management(DepartmentBedChart $chart, Request $request){
        $beds = BedSpace::latest()
        ->where('status','!=','Released')
        ->where('status', '!=', 'Deceased')
        ->where('hospital_id','=', auth()->guard('department')->user()->hospital_id)
        ->get();
        $active_bed_numbers = BedSpace::latest()
        ->select('bed_number')
        ->where('status','!=','Released')
        ->where('status', '!=', 'Deceased')
        ->where('hospital_id','=', auth()->guard('department')->user()->hospital_id)
        ->orderBy('id', 'ASC')
        ->get()
        ->toArray();
        $actives = array();
        $count = count($active_bed_numbers)-1;
       for($i = 0 ; $i <= $count; $i++){
            array_push($actives,$active_bed_numbers[$i]['bed_number']);
       }
       $status = array("Undetermined","Good","Fair","Serious","Critical","Released","Deceased");
       $free_bed = 50 - $beds->count();
        return view('department.bed-management', ['chart' => $chart->build(),'beds'=> $beds, 'actives'=> $actives,'status'=> $status,'free_bed'=> $free_bed]);
    }

    public function fill_bed(){
        $active_bed_numbers = BedSpace::latest()
                ->select('bed_number')
                ->where('status','!=','Released')
                ->where('status', '!=', 'Deceased')
                ->where('hospital_id','=', auth()->guard('department')->user()->hospital_id)
                ->orderBy('id', 'ASC')
                ->get()
                ->toArray();
        $actives = array();
        $count = count($active_bed_numbers)-1;
               for($i = 0 ; $i <= $count; $i++){
                array_push($actives,$active_bed_numbers[$i]['bed_number']);
               }
        return view('department.fill-bed',['actives'=> $actives]);
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
        $bed->hospital_id = auth()->guard('department')->user()->hospital_id;
        $bed->last_edited_by = auth()->guard('department')->user()->name;
        $bed->next_of_kin = $request->next_of_kin;
        $bed->next_of_kin_number = $request->next_of_kin_number;
        $bed->doctor_name = $request->doctor_name;
        $bed->PID = null;
        $bed->save();

        return redirect('/department/bed/management');
    }

    public function update_bed_space(Request $request){
        if(isset($request->bed_status)){
            $bed = BedSpace::find(Crypt::decrypt($request->id));
            $bed->status = $request->bed_status;
            $bed->last_edited_by = auth()->guard('department')->user()->name;
            $bed->save();

            return redirect('/department/bed/management');
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
                                  ->where('hospital_id','=', auth()->guard('department')->user()->hospital_id)
                                  ->get();
        $status = array("Undetermined","Good","Fair","Serious","Critical","Released","Deceased");
        return view('department.search-bed',['beds'=> $beds, 'status'=> $status,'search'=> $search]);
    }

    public function all_history(){
        $beds = BedSpace::latest()
                    ->where('hospital_id','=', auth()->guard('department')->user()->hospital_id)
                    ->paginate(25);
        return view('department.all-history',['beds'=>$beds]);
    }

    public function existing_patient(){
        return view('department.fill-existing-bed');
    }

    public function confirm_identity(Request $request){
        $patients = Patient::where('surname','=',$request->search)
                    ->orWhere('PID','=',$request->search)
                    ->where('hospital_id','=', auth()->guard('department')->user()->hospital_id)
                    ->get();
        $patient_count = $patients->count();
        return view('department.fill-existing-bed',['patients'=> $patients,'patient_count'=> $patient_count]);
    }

    public function use_existing($id){
        $active_bed_numbers = BedSpace::latest()
        ->select('bed_number')
        ->where('status','!=','Released')
        ->where('status', '!=', 'Deceased')
        ->where('hospital_id','=', auth()->guard('department')->user()->hospital_id)
        ->orderBy('id', 'ASC')
        ->get()
        ->toArray();
        $patient = Patient::find(Crypt::decrypt($id));
        $status = array("Undetermined","Good","Fair","Serious","Critical","Released","Deceased");
        $actives = array();
        $count = count($active_bed_numbers)-1;
       for($i = 0 ; $i <= $count; $i++){
        array_push($actives,$active_bed_numbers[$i]['bed_number']);
       }
        return view('department.existing-form',['patient'=>$patient, 'actives'=> $actives]);
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
        $bed->hospital_id = auth()->guard('department')->user()->hospital_id;
        $bed->next_of_kin = $request->next_of_kin;
        $bed->last_edited_by = auth()->guard('department')->user()->name;
        $bed->next_of_kin_number = $request->next_of_kin_number;
        $bed->doctor_name = $request->doctor_name;
        $bed->PID = $patient->PID;
        $bed->save();

        return redirect('/department/bed/management');
    }

    public function bed_detail($id){
        $patient = BedSpace::find(Crypt::decrypt($id));
        if($patient->hospital_id == auth()->guard('department')->user()->hospital_id){
        return view('department.in-bed-details',['patient'=> $patient]);
        }else{
            return redirect()->back();
        }
    }
}
