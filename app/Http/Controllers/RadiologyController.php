<?php

namespace App\Http\Controllers;

use App\Models\RadiologyUpload;
use Illuminate\Http\Request;

class RadiologyController extends Controller
{
    public function show(){
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
}
