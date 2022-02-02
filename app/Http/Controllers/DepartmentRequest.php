<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\RequestFiles;
use App\Models\RequestReply;
use App\Models\RequestReplyFiles;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DepartmentRequest extends Controller
{
    public function show($status){
        $reqs = Requests::latest()->where('from',auth()->guard('department')->user()->id)->where('status',Crypt::decrypt($status))->get();
        return view('department.request',['reqs'=>$reqs,'status'=> Crypt::decrypt($status)]);
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
        $req->sender_name = auth()->guard('department')->user()->name;
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

        return redirect('/department/request/' . Crypt::encrypt('Open'));
    }

    public function reply(){

    }

    public function req_details($id){
        $req_id = Crypt::decrypt($id);
        $req = Requests::find($req_id);
        $replies = RequestReply::where('request_id',$req_id)->where('from','Admin')->orWhere('to','Admin')->get();
        $reply_files = RequestReplyFiles::where('request_id',$req_id)->get();
        $department = Department::select('name')->where('id',$req->from)->first();
        $files = RequestFiles::where('requests_id',$req_id)->get();

        return view('department.track-request',['req'=>$req, 'files'=> $files,'department'=>$department,'replies'=>$replies,'reply_files'=> $reply_files]);

    }
    public function show_reply($id){
        $req = Requests::find(Crypt::decrypt($id));
        return view('department.request-reply',['req'=>$req]);
    }

    public function send_reply(Request $request){
        $request->validate([
            'message'=> 'required',
            'files.*' => 'mimes:png,jpg,jpeg'
        ]);
        $req = Requests::find(Crypt::decrypt($request->id));
        $reply = new RequestReply;
        $reply->message = $request->message;
        $reply->from = auth()->guard('department')->user()->name;
        $reply->request_id = $req->id;
        $reply->hospital_id = auth()->user()->id;
        $reply->to = 'Admin';
        $reply->is_read = 0;
        $reply->status = 'Open';
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
    }
    $req->status = 'Open';
    $req->save();
    return redirect('/department/request/all');
}

    public function closed_request(){
        $reqs = Requests::latest()->where('from',auth()->guard('department')->user()->id)->where('status','Closed')->get();

        return view('department.closed-request',['reqs'=>$reqs]);
    }

}
