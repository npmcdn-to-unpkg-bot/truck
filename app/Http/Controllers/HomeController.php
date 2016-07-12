<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator,Auth;

class HomeController extends Controller
{
	public function __construct()
	{
		
		$this->middleware('auth', ['only' => [
	        'signout',
        ]]);
	}

    public function showHome()
    {
    	return view('home');
    }

    public function showSignin()
    {
    	return view('signin');
    }

    public function signin(Request $request)
    {
    	$messages = [
	        'password.required' => 'We need to know your password!',
	        'email.required' => 'We need to know your e-mail address!',
	        'email.exists' => 'your e-mail address! does not exist in our database'
	    ];

	    $validator = Validator::make($request->all(), [
	        'password' => 'required',
	        'email' => 'required|email|exists:users,email'

	    ],$messages);
	    
	    if ($validator->fails()) {
	        return redirect('signin')
	                    ->withErrors($validator)
	                    ->withInput();
	    }

	    if (Auth::attempt(['email' => $request->input('email'), 'password' =>$request->input('password')])) {
    		
    		return redirect('/');
		}
	    return view('signin');
    }
     public function signout(Request $request)
    {
    	Auth::logout();
    	return  redirect('/');
    }
}