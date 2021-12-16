<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RadiologyController extends Controller
{
    public function show(){
        return view('hospital.add-upload');
    }
    public function store_credentials(Request $request){
        $request->validate([
            'full_name' => 'required|min:2|alpha',
            'gender' => 'required',
            'email_address' => 'required|email',
            'test_type' => 'required',
            'phone_number' => 'required|numeric'
        ]);
    }
}
