<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RadiologyController extends Controller
{
    public function show(){
        return view('hospital.add-upload');
    }
}
