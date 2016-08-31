<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Truck;

class MapsController extends Controller
{
    public function __construct()
	{
        $this->middleware('auth');
	}

    public function showMapsOfAllTrucks(Request $request)
    {
		if ($request->user()->isClient()) {
			return view('book.maps');
		}
    	return view('maps');
    }


    public function bookMapsJson()
    {
        $trucks = Truck::active()->toArray();
        return  json_encode(array_values($trucks));
    }

    public function JsonDataOfAllTrucks(Request $request)
    {
        if($request->user()->isAdmin()){
           $trucks = Truck::with(['data','driver'])->get()->toJson();
           return  $trucks;
        }

        $trucks = Truck::where('user_id', $request->user()->id)->get();
        $trucks =  $trucks->load(['data','driver'])->toJson();



        return  $trucks;
    }
}
