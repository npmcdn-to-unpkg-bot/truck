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

Route::get('truck/book', function () {
    return view('book');
});

Route::get('truck/maps/input', function () {
    return view('maps-input');
});

Route::post('truck/maps/data', function () {
    
});

Route::post('truck/maps/input', function () {
	echo "Not done yet";
	dd(Request::except('_token'));
    return view('maps-input');
});

Route::get('truck/maps', function () {
    return view('maps');
});