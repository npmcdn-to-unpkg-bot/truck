<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('truck/register', function () {
    return view('register');
});

Route::post('truck/register', function () {

	$messages = [
		'name.required' => 'We need to know your name!',
    	'email.required' => 'We need to know your e-mail address!',
    	'tel.required' => 'We need to know your phone number!',
    	'truck-tons.required' => 'We need to know the weight of the truck!',
        'truck-plate.required' => 'We need to know the plate number of the truck!',
        'truck-number.required' => 'We need to know the assign number of the truck of the truck!'
	];

	$validator = Validator::make(Request::all(), [
        'name' => 'required',
        'email' => 'required|email',
        'tel' => 'required|numeric',
        'truck-type' => '',
        'truck-model' => '',
        'truck-maker' => '',
        'truck-tons' => 'required|integer',
        'truck-plate' => 'required',
        'truck-number' => 'required|integer|unique:trucks,truck-number'

    ],$messages);
	
    if ($validator->fails()) {
        return redirect('truck/register')
                    ->withErrors($validator)
                    ->withInput();
    }

    App\Truck::create([
		'name'=> Request::input('name'),
    	'tel'=> Request::input('name'),
    	'email'=> Request::input('email'),
    	'truck-type'=> Request::input('truck-type'),
    	'truck-model'=> Request::input('truck-model'),
    	'truck-maker'=> Request::input('truck-maker'),
    	'truck-tons'=> Request::input('truck-tons'),
    	'truck-plate'=> Request::input('truck-plate'),
    	'truck-number'=> App\Truck::count() + 1
	]);


    return view('register');
});

Route::get('truck/book', function () {
    return view('book');
});

Route::get('truck/maps/input', function () {
    return view('maps-input');
});

Route::post('truck/maps/input', function () {

	$messages = [
		'truck-number.required' => 'We need to know the number of the truck!',
    	'truck-speed.required' => 'We need to know the speed of the truck!',
    	'truck-lat.required' => 'We need to know the latitude of the truck!',
    	'truck-lng.required' => 'We need to know the longitude of the truck!',
        'truck-active.required' => 'We need to know if the truck is active or not!'
	];

	$validator = Validator::make(Request::all(), [
        'truck-number' => 'required|integer' ,
        'truck-speed' => 'required|integer',
        'truck-lat' => 'required|numeric',
        'truck-lng' => 'required|numeric',
        'truck-active' => 'required|boolean'
    ],$messages);
	
    if ($validator->fails()) {
        return redirect('truck/maps/input')
                    ->withErrors($validator)
                    ->withInput();
    }
	
	App\TruckData::firstOrCreate([
		'truck_id' => Request::input('truck-number'), 
		'truck-speed' => Request::input('truck-speed'), 
		'truck-lat' => Request::input('truck-lat'), 
		'truck-lng' => Request::input('truck-lng'), 
		'truck-active' => Request::input('truck-active')
	]);

    return view('maps-input');
});

Route::post('truck/maps/data', function () {
	$trucks = App\Truck::with('data')->get();

    return App\Truck::with('data')->get()->toJson();
});

Route::get('truck/maps/data', function () {
    return App\Truck::with('data')->get();
});

Route::get('truck/maps', function () {
    return view('maps');
});