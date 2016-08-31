<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Truck;
use App\TruckData;
use Validator;

class InputController extends Controller
{
    public function __construct()
	{
        $this->middleware('auth');
	}

    public function create()
    {
    	return view('truck.input');
    }

    public function store(Request $request)
    {
    	$messages = [
			'id.required' => 'We need to know the id of the truck!',
			'id.exists' => 'the truck does not exist in the database',
	    	'speed.required' => 'We need to know the speed of the truck!',
	    	'lat.required' => 'We need to know the latitude of the truck!',
	    	'lng.required' => 'We need to know the longitude of the truck!',
	        'active.required' => 'We need to know if the truck is active or not!'
		];

		$validator = Validator::make($request->all(), [
	        'id' => 'required|integer|exists:trucks,id' ,
	        'speed' => 'required|numeric',
	        'lat' => 'required|numeric',
	        'lng' => 'required|numeric',
	        'active' => 'required|boolean'
	    ],$messages);

	    if ($validator->fails()) {
	        return redirect('truck/input')
	                    ->withErrors($validator)
	                    ->withInput();
	    }

		TruckData::create([
			'truck_id' => $request->input('id'),
			'speed' => $request->input('speed'),
			'lat' => $request->input('lat'),
			'lng' => $request->input('lng'),
			'active' => $request->input('active')
		]);

	    return view('truck.input')->withSuccess('Everything went great');
    }

    public function input(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required|integer|exists:trucks,id' ,
            'speed' => 'required|numeric',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'active' => 'required|boolean',
            'password' =>'required'
        ]);

        if ($validator->fails()) {
            //return
            //abort(400 , 'Unauthorized action.');
        }

        $truck = Truck::findOrFail(request()->input('id'));

        if(!($truck->password === request()->input('password'))){
            abort(403, 'Unauthorized action.');
        }

        TruckData::create([
            'truck_id' => request()->input('id'),
            'speed' => request()->input('speed'),
            'lat' => request()->input('lat'),
            'lng' => request()->input('lng'),
            'active' => request()->input('active')
        ]);

        return "data inserted successfully";
    }
}
