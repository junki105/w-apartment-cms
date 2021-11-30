<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\Amount;
use App\Area;
use App\HouseType;
class ResultController extends Controller
{
    //
    public function show($id) {
        $result = Result::find($id);
        $url = route('case-study');
        $url .= '/'.$id;
        $social_share = \Share::page($url, $result->title)
        ->facebook()
        ->reddit()
        ->twitter();

        return view('case-study-single', compact('result', 'social_share'));
    }
    public function search(Request $request) {
        $results = null;
        $amounts = Amount::all();
        $areas = Area::all();
        $housetypes = HouseType::all();
        if( $request->area!=null) {
            $results = Result::where('area_id',"=","$request->area");
        }
        if($request->amount!=null) {
            if( $results == null ) {
                $results = Result::where('amount_id',"=",$request->amount);
            }
            else {
                $results = $results->where('amount_id',"=",$request->amount);
            }
        }
        if($request->housetype!=null) {
            if( $results == null ) {
                $results = Result::where('housetype_id',"=",$request->housetype);
            }
            else {
                $results = $results->where('housetype_id',"=",$request->housetype);
            }
        }
        if( $results == null ) {
            $results = Result::where('public_status', '=' ,'1')->orderBy('updated_at','DESC')->paginate(5);
        }
        else {
            $count = $results->count();
            $results = $results->where('public_status', '=' ,'1')->orderBy('updated_at','DESC')->paginate(5);
        }
        return view('case-study', compact('amounts','areas','housetypes','results'));
    }
}
