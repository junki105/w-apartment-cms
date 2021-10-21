<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
class ResultController extends Controller
{
    //
    public function show($id){
        $result = Result::find($id);
        return view('case-study-single',compact('result'));
    }
}
