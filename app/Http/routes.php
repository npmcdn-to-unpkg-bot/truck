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

//Login Routes
Route::get('signin', 'LoginController@showSigninForm');
Route::post('signin', 'LoginController@signin');
Route::get('signout', 'LoginController@signout');


//Client Registration routes
Route::get('register', 'RegisterController@create');
Route::post('register', 'RegisterController@store');


// Truck data input routes
Route::get('truck/input/create', 'InputController@create')->name('truck.input.create');
Route::post('truck/input', 'InputController@store')->name('truck.input.store');
Route::any('input','InputController@input')->name('truck.data');


//Truck Booking controller
Route::get('truck/book', 'BookTruckController@index')->name('truck.book.index');
Route::get('truck/book/{truck}', 'BookTruckController@show');
Route::post('truck/book', 'BookTruckController@store')->name('truck.book.store');
Route::post('truck/book/maps', 'MapsController@bookMapsJson')->name('truck.book.json');

//Driver Routes
Route::resource('driver', 'DriverController');

//Vehicle Routes
Route::resource('vehicle', 'VehicleController');

//truck routes
Route::get('truck/maps', 'MapsController@showMapsOfAllTrucks')->name('truck.maps');
Route::post('truck/maps', 'MapsController@JsonDataOfAllTrucks')->name('truck.json');
Route::resource('truck', 'TruckController');
