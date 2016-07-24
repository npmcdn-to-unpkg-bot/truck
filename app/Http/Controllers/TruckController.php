<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\TruckData;
use App\Truck;

class TruckController extends Controller
{
    public function __construct()
	{
        $this->middleware('auth', ['only' => [
	        'allTrucks','showAllTrucks'
        ]]);

		$this->middleware('role:driver', ['only' => [
	        'create','store'
        ]]);

        $this->middleware('role:admin', ['only' => [
	        'showInput','storeInput','show','edit','update','destroy'
        ]]);
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

    public function show($id)
    {
        $truck = Truck::findOrFail($id);
    	return view('truck.show')->with('truck',$truck);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }


    public function showAllTrucks(Truck $truck,Request $request)
    {
        if($request->user()->isAdmin()){
           $trucks = $truck->with(['data','driver'])->simplePaginate(1);
           return view('truck.trucks',[
   	           'trucks' => $trucks,
   	        ]);
        }

        $trucks = Truck::where('user_id', $request->user()->id)->get();

	    return view('truck.trucks',[
	        'trucks' => $trucks,
	    ]);
    }

    public function allTrucks(Request $request)
    {
        if($request->user()->isAdmin()){
           $trucks = Truck::with(['data','driver'])->get()->toJson();
           return  $trucks;
        }

        $trucks = Truck::where('user_id', $request->user()->id)->get();
        $trucks =  $trucks->load(['data','driver'])->toJson();



        return  $trucks;
    }

    public function showInput()
    {
    	return view('truck.input');
    }

    public function storeInput(Request $request)
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
}
