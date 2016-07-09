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
    return view('register_truck');
});

Route::post('truck/register', function () {

	$messages = [
		'first_name.required' => 'We need to know your First Name!',
		'surname.required' => 'We need to know your Surname!',
    	'email.required' => 'We need to know your e-mail address!',
    	'tel.required' => 'We need to know your phone number!',
    	'truck_tons.required' => 'We need to know the weight of the truck!',
        'truck_plate.required' => 'We need to know the plate number of the truck!',
        'truck_plate_state.required' => 'We need to know the state of you plate number!'
	];

	$validator = Validator::make(Request::all(), [
        'first_name' => 'required',
        'surname' => 'required',
        'middle_name' => '',
        'email' => 'required|email',
        'tel' => 'required|numeric',
        'truck_manufacture_date' => '',
        'truck_model' => '',
        'truck_maker' => '',
        'truck_tons' => 'required|integer',
        'truck_plate' => 'required',
        'truck_plate_state' => 'required'

    ],$messages);
	
    if ($validator->fails()) {
        return redirect('truck/register')
                    ->withErrors($validator)
                    ->withInput();
    }

    App\Truck::create([
		'first_name'=> Request::input('first_name'),
		'surname'=> Request::input('surname'),
		'middle_name'=> Request::input('middle_name'),
    	'tel'=> '+234'.ltrim(Request::input('tel'), '0'),
    	'email'=> Request::input('email'),
    	'truck_manufacture_date'=> Request::input('truck_manufacture_date'),
    	'truck_model'=> Request::input('truck_model'),
    	'truck_maker'=> Request::input('truck_maker'),
    	'truck_tons'=> Request::input('truck_tons'),
    	'truck_plate'=> Request::input('truck_plate'),
    	'truck_plate_state'=> Request::input('truck_plate_state')
	]);


    return view('register_truck')->withSuccess('Everything went great');
});

Route::get('truck/book', function () {
    return view('book_truck');
});

Route::get('truck/password/suspend', function () {
    return view('password_suspend');
});

Route::post('truck/password/suspend', function () {
    $messages = [
        'truck_number.required' => 'We need to know the number of the truck!',
        'truck_password.required' => 'We need to know the password of the truck!',
        'truck_suspend.required' => 'We need to know if the truck is suspended or not!'
    ];

    $validator = Validator::make(Request::all(), [
        'truck_number' => 'required|integer' ,
        'truck_password' => 'required',
        'truck_suspend' => 'required|boolean'
    ],$messages);
    
    if ($validator->fails()) {
        return redirect('truck/password/suspend')
                    ->withErrors($validator)
                    ->withInput();
    }

    $truck = App\Truck::find(Request::input('truck_number'));

    $truck->truck_password = Request::input('truck_password');
    $truck->truck_suspend = Request::input('truck_suspend');
    
    $truck->save();

    return view('password_suspend')->withSuccess('Everything went great');
});

//truck/maps/input/3/12/12/12/0/hello
Route::any('truck/maps/input/{truckNumber}/{truckSpeed}/{truckLat}/{truckLng}/{truckActive}/{password}',function($truckNumber,$truckSpeed,$truckLat,$truckLng,$truckActive,$password){

    $truck = App\Truck::findOrFail($truckNumber);
    if($truck->truck_password == $password){
        App\TruckData::firstOrCreate([
            'truck_id' => $truckNumber, 
            'truck_speed' => $truckSpeed, 
            'truck_lat' => $truckLat, 
            'truck_lng' => $truckLng, 
            'truck_active' => $truckActive
        ]);
        return "data inserted successfully";
    }else{
        abort(403, 'Unauthorized action.');
    }
    
});

Route::get('trucks', function () {
    $trucks = App\Truck::with('data')->get();
    return view('trucks',[
        'trucks' => $trucks,
    ]);
});

Route::get('truck/maps/input', function () {
    return view('maps_input');
});

Route::post('truck/maps/input', function () {

	$messages = [
		'truck_number.required' => 'We need to know the number of the truck!',
    	'truck_speed.required' => 'We need to know the speed of the truck!',
    	'truck_lat.required' => 'We need to know the latitude of the truck!',
    	'truck_lng.required' => 'We need to know the longitude of the truck!',
        'truck_active.required' => 'We need to know if the truck is active or not!'
	];

	$validator = Validator::make(Request::all(), [
        'truck_number' => 'required|integer' ,
        'truck_speed' => 'required|numeric',
        'truck_lat' => 'required|numeric',
        'truck_lng' => 'required|numeric',
        'truck_active' => 'required|boolean'
    ],$messages);
	
    if ($validator->fails()) {
        return redirect('truck/maps/input')
                    ->withErrors($validator)
                    ->withInput();
    }
	
	App\TruckData::firstOrCreate([
		'truck_id' => Request::input('truck_number'), 
		'truck_speed' => Request::input('truck_speed'), 
		'truck_lat' => Request::input('truck_lat'), 
		'truck_lng' => Request::input('truck_lng'), 
		'truck_active' => Request::input('truck_active')
	]);

    return view('maps_input')->withSuccess('Everything went great');
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