<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class AdminController extends Controller
{
    public function showDrivers()
    {	
    	$drivers =  \App\User::with('roles')->get();
    	$drivers = $drivers->filter(function ($value, $key) {
    		return $value->isDriver();
		});
    	return view('admin.drivers',[
    		'drivers' => $drivers
    	]);
    }

    public function showRegister()
    {
    	return view('admin.register');
    }

    public function createUser(Request $request, \App\User $user)
    {
    	$messages = [
			'first_name.required' => 'We need to know your First Name!',
			'user_role.required' => 'We need to know the role of the user!',
			'surname.required' => 'We need to know your Surname!',
	    	'email.required' => 'We need to know your e-mail address!',
	    	'password.required' => 'We need to know your password!',
	    	'tel.required' => 'We need to know your phone number!'
		];

		$validator = Validator::make($request->all(), [
	        'first_name' => 'required',
	        'surname' => 'required',
	        'user_role' => 'required|exists:roles,name',
	        'middle_name' => 'present',
	        'email' => 'required|email|unique:users,email',
	        'password'=> 'required',
	        'tel' => 'required|numeric'

	    ],$messages);
		
	    if ($validator->fails()) {
	        return redirect('admin/register/user')
	                    ->withErrors($validator)
	                    ->withInput();
	    }
	    $role = \App\Role::where('name', '=', $request->input('user_role'))->firstOrFail()->id;
	   $user = $user->create([
	   		'first_name' => $request->input('first_name'),
	        'surname' => $request->input('surname'),
	        'middle_name' => $request->input('middle_name'),
	        'email' => $request->input('email'),
	        'password'=> bcrypt($request->input('password')),
	        'tel' => '+234'.ltrim($request->input('tel'), '0')
	   ]);
	   $user->roles()->attach($role);
    	return view('admin.register')->withSuccess('the Account was registered successfully');
    }

    public function showMaps()
    {
    	return view('admin.maps');
    }

    public function showInput()
    {
    	return view('admin.input');
    }

    public function truckInput(Request $request)
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
	        return redirect('admin/truck/input')
	                    ->withErrors($validator)
	                    ->withInput();
	    }
		
		\App\TruckData::firstOrCreate([
			'truck_id' => $request->input('id'), 
			'speed' => $request->input('speed'), 
			'lat' => $request->input('lat'), 
			'lng' => $request->input('lng'), 
			'active' => $request->input('active')
		]);

	    return view('admin.input')->withSuccess('Everything went great');
    }

    public function showTrucks(\App\Truck $truck)
    {
    	$trucks = $truck->with('driver')->get();
	    return view('admin.trucks',[
	        'trucks' => $trucks,
	    ]);
    }


    public function showTruck($id)
    {
    	$truck = \App\Truck::findOrFail($id);
    	return view('admin.edit_truck')->with('truck',$truck);
    	
    }

    public function showDriver($id)
    {	
    	$driver = \App\Driver::findOrFail($id);
    	dd($driver);
    }

    public function updateTruck($id)
    {
    	$messages = [
	    	'tons.required' => 'We need to know the weight of the truck!',
	        'plate.required' => 'We need to know the plate number of the truck!',
	        'plate_state.required' => 'We need to know the state of you plate number!'
		];

		$validator = Validator::make($request->all(), [
	        'manufacture_date' => 'required|numeric',
	        'model' => '',
	        'maker' => '',
	        'tons' => '',
	        'plate' => 'required',
	        'plate_state' => 'required'

	    ],$messages);
		
	    if ($validator->fails()) {
	        return back()
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
    	
    	dd($truck);
    }

    public function updateDriver($id)
    {
    	dd($driver);
    }
}
