<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index(){
        $facilities = Facility::get();

        return view('pages.facilities',compact('facilities'));
    }
}
