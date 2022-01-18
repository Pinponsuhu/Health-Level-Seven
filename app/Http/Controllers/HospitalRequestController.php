<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalRequestController extends Controller
{
    public function show(){
        return view('hospital.request');
    }
}
