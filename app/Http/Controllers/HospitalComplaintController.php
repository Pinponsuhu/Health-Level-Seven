<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\ComplainFiles;
use App\Models\ReplyComplain;
use App\Models\ReplyComplainFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HospitalComplaintController extends Controller
{
    public function all_complaint(){
        $complaint = Complain::latest()->where('status','Open')->get();
        return view('hospital.complain',['complaint'=> $complaint]);
    }

    public function show_complaint(){
        return view('hospital.new-complaint');
    }

    public function store_complaint(Request $request){
        $request->validate([
            'title' => 'required',
            'content'=> 'required',
            'files.*' => 'mimes:png,jpg,jpeg,docx,doc,pdf,html'
        ]);

        $complain = new Complain;
        $complain->title = $request->title;
        $complain->content = $request->content;
        $complain->from = auth()->user()->hospital_name;
        $complain->hospital_id = auth()->user()->id;
        $complain->to = 'Super Admin';
        $complain->is_read = 0;
        $complain->status = 'Open';
        $complain->save();

        $dest = 'public/complains';
        if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                $name = $file->store($dest);

                $complainfiles = new ComplainFiles;
                $complainfiles->complain_id = $complain->id;
                $complainfiles->filename = str_replace('public/complains/','',$name);
                $complainfiles->complain_title = $request->title;
                $complainfiles->save();
            }
        }

        return redirect('/hospital/active/complain/');
    }

    public function track_complaint($id){
        $req_id = Crypt::decrypt($id);
        $req = Complain::find($req_id);
        $replies = ReplyComplain::where('complain_id',$req_id)->get();

        // dd($replies);
        $reply_files = ReplyComplainFile::where('complain_id',$req_id)->get();
        $department = User::select('hospital_name')->where('id',$req->hospital_id)->first();
        $files = ComplainFiles::where('complain_id',$req_id)->get();

        return view('hospital.track-complaint',['req'=>$req, 'files'=> $files,'department'=>$department,'replies'=>$replies,'reply_files'=> $reply_files]);
    }


}
