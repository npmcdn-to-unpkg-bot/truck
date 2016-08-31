<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Truck;

class TruckController extends Controller
{
    public function __construct()
	{
        $this->middleware('auth');
	}

    public function create()
    {
    	return view('truck.register');
    }

    public function store(Request $request)
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

	    Truck::create([
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

    public function show(Truck $truck)
    {

    	return view('truck.show')->with('truck',$truck);
    }

    public function edit(Truck $truck)
    {

        return view('admin.edit_truck',[
            'truck' => $truck
        ]);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }


    public function index(Truck $truck,Request $request)
    {
        $trucks = Truck::where('user_id', $request->user()->id)->get();

        if($request->user()->isAdmin()){
           $trucks = $truck->with(['data','driver'])->simplePaginate(20);
        }

	    return view('truck.trucks',[
	        'trucks' => $trucks,
	    ]);
    }




}
