<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator,Auth;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'signout']);
    }

    public function showSigninForm()
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


		 $validator->getMessageBag()->add('password', 'Password wrong');
	    return redirect('signin')
				->withErrors($validator)
				->withInput();

    }
     public function signout(Request $request)
    {
    	Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

    	return  redirect('/');
    }
}
