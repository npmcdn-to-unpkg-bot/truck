<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class TruckController extends Controller
{
    

    public function showRegister()
    {
    	return view('truck.register');
    }

    public function createTruck(Request $request)
    {
    	$messages = [
	    	'tons.required' => 'We need to know the weight of the truck!',
	        'plate.required' => 'We need to know the plate number of the truck!',
	        'plate_state.required' => 'We need to know the state of you plate number!'
		];

		$validator = Validator::make($request->all(), [
	        'manufacture_date' => 'required|numeric',
	        'model' => 'required',
	        'maker' => 'required',
	        'tons' => 'required|integer',
	        'plate' => 'required',
	        'plate_state' => 'required'

	    ],$messages);
		
	    if ($validator->fails()) {
	        return redirect('truck/register')
	                    ->withErrors($validator)
	                    ->withInput();
	    }
	   
	    \App\Truck::create([
	    	'user_id' => $request->user()->id,
            'current_driver_id' =>$request->user()->id,
	    	'manufacture_date'=> $request->input('manufacture_date'),
	    	'model'=> $request->input('model'),
	    	'maker'=> $request->input('maker'),
	    	'tons'=> $request->input('tons'),
	    	'plate'=> $request->input('plate'),
	    	'plate_state'=> $request->input('plate_state')
		]);


	    return view('truck.register')->withSuccess('Your truck was added');
    }

    public function bookTruck()
    {
    	return view('truck.book');
    }
    
    public function createBook()
    {	
    	return view('truck.book');
    }
    
}
