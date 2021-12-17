<?php

namespace App\Http\Controllers;

use App\Models\RadiologyFiles;
use App\Models\RadiologyUpload;
use Illuminate\Http\Request;

class RadiologyController extends Controller
{
    public function show_form(){
        return view('hospital.add-upload');
    }
    public function store_credentials(Request $request){
        $request->validate([
            'full_name' => 'required|min:2',
            'gender' => 'required',
            'email_address' => 'required|email',
            'test_type' => 'required',
            'phone_number' => 'required|numeric'
        ]);
        $upload = new RadiologyUpload;
        $upload->full_name = $request->full_name;
        $upload->gender = $request->gender;
        $upload->email_address = $request->email_address;
        $upload->test_type = $request->test_type;
        $upload->hospital_id = auth()->user()->id;
        $upload->phone_number = $request->phone_number;
        $upload->save();

        return redirect('/hospital/dashboard');
    }
    public function track_uploads(){
        $uploads = RadiologyUpload::latest()->paginate(20);
        return view('hospital.all-uploads',['uploads'=>$uploads]);
    }
    public function upload_details($id){
        $upload = RadiologyUpload::find($id)->first();
        $files = RadiologyFiles::where('upload_id','=',$upload)
        return view('hospital.upload-details',['upload'=>$upload]);
    }
}
