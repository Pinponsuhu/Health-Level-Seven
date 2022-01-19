<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;

class HospitalRequestController extends Controller
{
    public function show(){
        $reqs = Requests::latest()->get();
        return view('hospital.request', ['reqs'=>$reqs]);
    }
}
