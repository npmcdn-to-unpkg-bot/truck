<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator,Auth;
use App\User;

class DriverController extends Controller
{
	public function __construct()
	{
		/*$this->middleware('auth:admin', ['only' => [
	        'fooAction',
        ]]);*/
	}

    public function showRegister()
    {
    	return view('driver.register');
    }

    public function showMaps()
    {
    	return view('driver.maps');
    }

    public function createDriver(Request $request, User $user)
    {
    	$messages = [
			'first_name.required' => 'We need to know your First Name!',
			'surname.required' => 'We need to know your Surname!',
	    	'email.required' => 'We need to know your e-mail address!',
	    	'password.required' => 'We need to know your password!',
	    	'tel.required' => 'We need to know your phone number!'
		];

		$validator = Validator::make($request->all(), [
	        'first_name' => 'required',
	        'surname' => 'required',
	        'middle_name' => 'present',
	        'email' => 'required|email|unique:users,email',
	        'password'=> 'required',
	        'tel' => 'required|numeric'

	    ],$messages);
		
	    if ($validator->fails()) {
	        return redirect('driver/register')
	                    ->withErrors($validator)
	                    ->withInput();
	    }
	   $user = $user->create([
	   		'first_name' => $request->input('first_name'),
	        'surname' => $request->input('surname'),
	        'middle_name' => $request->input('middle_name'),
	        'email' => $request->input('email'),
	        'password'=> bcrypt($request->input('password')),
	        'tel' => '+234'.ltrim($request->input('tel'), '0')
	   ]);
	   $role = \App\Role::where('name', '=', 'driver')->firstOrFail()->id;
	   $user->roles()->attach($role);
	   Auth::login($user);
    	return view('truck.register')->withSuccess('Your Account was registered successfully');
    }

    public function showTrucks(\App\Truck $truck,Request $request)
    {
    	$trucks = $truck->where('user_id', $request->user()->id)->get();
	    return view('driver.trucks',[
	        'trucks' => $trucks,
	    ]);
    }
}
