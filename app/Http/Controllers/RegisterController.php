<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\User;

class RegisterController extends Controller
{
    public function __construct()
    {

    }

    public function create()
    {
        return view('register');
    }

    protected function storeAdmin(Request $request, User $user)
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
	        return redirect()->route('register.create')
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
    	return view('register')->withSuccess('the Account was registered successfully');
    }

    public function store(Request $request, User $user)
    {
        if($request->user()){
            if ($request->user()->isAdmin()) {
                return $this->storeAdmin($request,$user);
            }

        }

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
	        return redirect()->route('register.create')
	                    ->withErrors($validator)
	                    ->withInput();
	    }
        $role = \App\Role::where('name', '=', 'driver')->firstOrFail()->id;
	   $user = $user->create([
	   		'first_name' => $request->input('first_name'),
	        'surname' => $request->input('surname'),
	        'middle_name' => $request->input('middle_name'),
	        'email' => $request->input('email'),
	        'password'=> bcrypt($request->input('password')),
	        'tel' => '+234'.ltrim($request->input('tel'), '0')
	   ]);
	   $user->roles()->attach($role);
    	return view('register')->withSuccess('the Account was registered successfully');

    }
}
