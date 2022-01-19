<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\RequestFiles;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DepartmentRequest extends Controller
{
    public function show(){
        $reqs = Requests::latest()->get();
        return view('department.request',['reqs'=>$reqs]);
    }
    public function show_add(){
        return view('department.new-request');
    }
    public function store_new(Request $request){
        $request->validate([
            'title' => 'required',
            'content'=> 'required',
            'files.*' => 'mimes:png,jpg,jpeg'
        ]);

        $req = new Requests;
        $req->title = $request->title;
        $req->content = $request->content;
        $req->from = auth()->guard('department')->user()->id;
        $req->hospital_id = auth()->guard('department')->user()->hospital_id;
        $req->to = 'Admin';
        $req->is_read = 0;
        $req->status = 'Open';
        $req->save();

        $dest = 'public/requests';
        if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                $name = $file->store($dest);

                $requestsImage = new RequestFiles;
                $requestsImage->requests_id = $req->id;
                $requestsImage->filename = str_replace('public/requests/','',$name);
                $requestsImage->request_title = $request->title;
                $requestsImage->save();
            }
        }

        return redirect('/department/request/all');
    }

    public function reply(){
        
    }

    public function req_details($id){
        $req_id = Crypt::decrypt($id);
        $req = Requests::find($req_id);
        $department = Department::select('name')->where('id',$req->from)->first();
        $files = RequestFiles::where('requests_id',$req_id)->get();

        return view('department.track-request',['req'=>$req, 'files'=> $files,'department'=>$department]);

    }
}
