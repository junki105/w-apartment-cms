<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Housing;
class HouseController extends Controller
{
    //
    public function show_house($id){
        $house = Housing::find($id);
        return view('house-single',compact('house'));
    }
}
