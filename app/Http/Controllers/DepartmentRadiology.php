<?php

namespace App\Http\Controllers;

use App\Models\RadiologyFiles;
use App\Models\RadiologyUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DepartmentRadiology extends Controller
{
    public function __construct()
    {
        $this->middleware(['department','rad']);
    }

    public function show_form(){
        return view('department.add-upload');
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
        $upload->hospital_id = auth()->guard('department')->user()->hospital_id;
        $upload->phone_number = $request->phone_number;
        $upload->last_edited_by = auth()->guard('department')->user()->name;
        $upload->save();

        return redirect('/department/dashboard');
    }

    public function track_uploads(){
        $uploads = RadiologyUpload::latest()->paginate(20);
        return view('department.all-uploads',['uploads'=>$uploads]);
    }

    public function upload_details($id){
        $upload = RadiologyUpload::find(Crypt::decrypt($id))->first();
        $files = RadiologyFiles::where('upload_id','=',$upload->id)->get();
        return view('department.upload-details',['upload'=>$upload, 'files'=>$files]);
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
        $fileModel->upload_id = Crypt::decrypt($id);
        $fileModel->save();

        return redirect('/department/dashboard');
        }
    }
}
