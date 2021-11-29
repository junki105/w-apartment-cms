<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Housing;

class PhilosophyController extends Controller
{
    public function index() {
        $houses = Housing::orderBy('updated_at','DESC')->paginate(6);
        return view('philosophy',compact('houses'));
    }
}
