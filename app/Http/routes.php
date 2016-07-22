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


Route::get('/', 'HomeController@home')->name('home');
Route::get('signin', 'HomeController@showSignin')->name('signin');
Route::post('signin', 'HomeController@signin');
Route::get('signout', 'HomeController@signout');

Route::get('register', 'RegisterController@create')->name('register.create');
Route::post('register', 'RegisterController@store')->name('register.store');
Route::get('maps', 'HomeController@showMaps')->name('maps.show');

Route::get('driver/{id}', 'DriverController@show')->name('driver.show')->where('id', '[0-9]+');
Route::get('driver/{id}/edit', 'DriverController@edit')->name('driver.edit');
Route::put('driver/{id}', 'DriverController@update')->name('driver.update');
Route::delete('driver/{id}', 'DriverController@destroy')->name('driver.destroy');
Route::get('drivers', 'DriverController@showAllDrivers')->name('drivers.show');



Route::get('truck/input', 'TruckController@showInput')->name('truck.input.show');
Route::post('truck/input', 'TruckController@storeInput')->name('truck.input.create');

Route::get('truck/register', 'TruckController@create')->name('truck.create');
Route::post('truck/register', 'TruckController@store')->name('truck.store');

Route::get('truck/book', 'BookTruckController@index')->name('truck.book');
Route::get('truck/book/{id}', 'BookTruckController@show')->name('truck.book.show');
Route::post('truck/book', 'BookTruckController@store');
Route::post('book/maps', 'BookTruckController@maps');
//
// Route::get('app/trucks', function(){
//
//     $trucks = \App\Truck::with(['data'])->get();
//     // $trucks = $truck::with(['data' => function ($query) {
//     //     $query->where('active', '=', 1);
//     //
//     // }])->get();
//
//     $trucks = $trucks->filter(function ($value, $key) {
//         return !!$value->data()->get()->last()->active;
//     });
//
//     return  response()->json($trucks);
// });

Route::get('trucks', 'TruckController@showAllTrucks')->name('trucks.show');
Route::post('trucks', 'TruckController@allTrucks')->name('trucks');

Route::get('truck/{id}', 'TruckController@show')->name('truck.show')->where('id', '[0-9]+');
Route::get('truck/{id}/edit', 'TruckController@edit')->name('truck.edit');
Route::put('truck/{id}', 'TruckController@update')->name('truck.update');
Route::delete('truck/{id}', 'TruckController@destroy')->name('truck.destroy');



// Route::group(['middleware' => ['auth','role:admin']], function () {
//
//         //truck/maps/input/3/12/12/12/0/hello
    Route::any('input', ['as' => 'truck.data',function(){

        $validator = Validator::make(request()->all(), [
	        'id' => 'required|integer|exists:trucks,id' ,
	        'speed' => 'required|numeric',
	        'lat' => 'required|numeric',
	        'lng' => 'required|numeric',
	        'active' => 'required|boolean',
            'password' =>'required'
	    ]);

	    if ($validator->fails()) {
	        abort(403, 'Unauthorized action.');
	    }

        $truck = \App\Truck::findOrFail(request()->input('id'));

        if(!($truck->password === request()->input('password'))){
            abort(403, 'Unauthorized action.');
        }

        App\TruckData::create([
            'truck_id' => request()->input('id'),
            'speed' => request()->input('speed'),
            'lat' => request()->input('lat'),
            'lng' => request()->input('lng'),
            'active' => request()->input('active')
        ]);

        return "data inserted successfully";
    }]);
//
// });
