<?php

namespace App\Http\Controllers;

use App\Models\RadiologyFiles;
use App\Models\RadiologyUpload;
use Illuminate\Http\Request;

class RadiologyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //methid to show forms
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
        $files = RadiologyFiles::where('upload_id','=',$upload->id)->get();
        return view('hospital.upload-details',['upload'=>$upload, 'files'=>$files]);
    }
    public function add_result(Request $request, $id){
        $request->validate([
            'result' => 'required',
            'result.*' => 'mimes:png,jpg,jpeg,pdf,docx,doc'
        ]);
        $fileModel = new RadiologyFiles;
        $dest = '/public/results';
        $files = $request->file('result');
        foreach($files as $file){
        $path = $file->store($dest);
        $fileModel->file_path = str_replace('public/results/','',$path);
        $fileModel->upload_id = $id;
        $fileModel->save();

        return redirect('/hospital/dashboard');
        }
    }
}
