<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Housing;
class HouseController extends Controller
{
    //
    public function show_house($id) {
        $house = Housing::find($id);
        return view('house-single',compact('house'));
    }
    public function list() {
        $houses = Housing::where('public_status', '=' ,'1')->orderBy('updated_at','DESC')->paginate(6);
        return view('house',compact('houses'));
    }
}
