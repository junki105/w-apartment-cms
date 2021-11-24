<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Housing;

class PhilosophyController extends Controller
{
    public function index(){
        $houses = Housing::latest()->paginate(6);
        return view('philosophy',compact('houses'));
    }
}
