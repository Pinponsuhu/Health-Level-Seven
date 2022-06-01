<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class HospitalDataExchange extends Controller
{
    public function show(){
        $hospitals = DB::select("select users.id, users.hospital_name, users.hospital_logo, users.HID, count(is_read) as unread from users LEFT JOIN messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . " where users.id != ". auth()->user()->id . " group by users.id, users.hospital_name, users.hospital_logo,users.HID, users.id");
        // dd($hospitals);
        return view('hospital.chat',['hospitals' => $hospitals]);
    }
    public function get_msg($user_id){
        $my_id = auth()->user()->id;
        Message::where(['from'=> $user_id, 'to'=> $my_id])->update(['is_read'=> 1]);
        $username = User::select('hospital_name','HID')->where('id',$user_id)->first();
        $messages = Message::where(function($query) use ($user_id, $my_id){
            $query->where('from',$my_id)->where('to',$user_id);
        })->orWhere(function($query) use($user_id, $my_id){
            $query->where('from',$user_id)->where('to',$my_id);
        })->get();
        // dd($messages);

        return view('hospital.messages.index',['messages'=> $messages,'username'=>$username]);
    }
    public function send_msg(Request $request){
        // dd($_FILES["files"]["name"]);
        $from = auth()->user()->id;
        $to = $request->receiver_id;
        $content = $request->message;
        $type = $request->msg_type;

        $data = new Message;
            $data->from = $from;
        $data->to = $to;
        $data->text = $type;
        $data->content = $content;
        $data->is_read = 0;
        $data->save();

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to'=>$to];
        $pusher->trigger('my-channel','my-event', $data);
    }

    public function send_file(Request $request){
        // print_r($request->all());

       $dest = '/public/message_file';
       $path = $request->file('file')->store($dest);
        $from = auth()->user()->id;
        $to = $request->reciever;
        $content = str_replace('public/message_file/','',$path);
        $type = 'file';

        $data = new Message;
            $data->from = $from;
        $data->to = $to;
        $data->text = $type;
        $data->content = $content;
        $data->is_read = 0;
        $data->save();

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to'=>$to];
        $pusher->trigger('my-channel','my-event', $data);
    }
}
