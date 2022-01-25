<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalComplaintController extends Controller
{
    public function all_complaint(){
        return view('hospital.complain');
    }
}
