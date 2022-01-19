<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\RequestFiles;
use App\Models\RequestReply;
use App\Models\RequestReplyFiles;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HospitalRequestController extends Controller
{
    public function show(){
        $reqs = Requests::latest()->where('status','Open')->get();
        return view('hospital.request', ['reqs'=>$reqs]);
    }
    public function track($id){
        $req_id = Crypt::decrypt($id);
        // dd($req_id);
        $req = Requests::find($req_id);
        $replies = RequestReply::where('request_id',$req_id)->where('from','Admin')->orWhere('to','Admin')->get();
        $reply_files = RequestReplyFiles::where('request_id',$req_id)->get();
        $department = Department::select('name')->where('id',$req->from)->first();
        $files = RequestFiles::where('requests_id',$req_id)->get();

        return view('hospital.track-request',['req'=>$req, 'files'=> $files,'department'=>$department,'replies'=>$replies,'reply_files'=> $reply_files]);
    }
    public function show_reply($id){

        $req = Requests::find(Crypt::decrypt($id));
        dd($req);
        return view('hospital.request-reply',['req'=>$req]);
    }
    public function send_reply(Request $request){
        dd(Crypt::decrypt($request->id));
        $request->validate([
            'message'=> 'required',
            'status' => 'required',
            'files.*' => 'mimes:png,jpg,jpeg'
        ]);
        $req = Requests::find(Crypt::decrypt($request->id));
        $reply = new RequestReply;
        $reply->message = $request->message;
        $reply->from = 'Admin';
        $reply->request_id = $req->id;
        $reply->hospital_id = auth()->user()->id;
        $reply->to = $req->from;
        $reply->is_read = 0;
        $reply->status = $request->status;
        $reply->save();
        $dest = 'public/requests_reply';
        if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                $name = $file->store($dest);
                $requestsImage = new RequestReplyFiles;
                $requestsImage->request_id = $req->id;
                $requestsImage->reply_id = $reply->id;
                $requestsImage->filename = str_replace('public/requests_reply/','',$name);
                $requestsImage->save();
            }
        $req->status = $request->status;
        $req->save();
    }
    return redirect('/request/all');
}
}