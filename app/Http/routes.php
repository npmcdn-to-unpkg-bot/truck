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

Route::group(['middleware' => ['guest']], function () {

    
    Route::get('signin', 'HomeController@showSignin')->name('signin');
    Route::post('signin', 'HomeController@signin');
    Route::get('driver/register', 'DriverController@showRegister')->name('driver.register');
    Route::post('driver/register', 'DriverController@createDriver');

});

Route::get('/', 'HomeController@showHome')->name('home');
Route::get('truck/book', 'TruckController@bookTruck')->name('truck.book');
Route::post('truck/book', 'TruckController@createBook');
Route::get('signout', 'HomeController@signout');

Route::group(['middleware' => ['auth']], function () {

    Route::post('/trucks', function () {
        if(Auth::user()->isAdmin()){
            $trucks = App\Truck::where('user_id', Auth::user()->id)->load(['data','driver'])->get()->toJson();
        }else{

            $trucks = App\Truck::with(['data','driver'])->get()->toJson();
        }
          

        return  $trucks;
    });

});

Route::group(['middleware' => ['auth','role:driver']], function () {
    
    Route::get('truck/register', 'TruckController@showRegister')->name('truck.register');
    Route::post('truck/register', 'TruckController@createTruck');
    Route::get('driver/trucks', 'DriverController@showTrucks')->name('driver.trucks');
    Route::get('driver/maps', 'DriverController@showMaps')->name('driver.maps');
});


Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::get('admin/register/user', 'AdminController@showRegister')->name('admin.register');
    Route::post('admin/register/user', 'AdminController@createUser');
    Route::get('admin/drivers', 'AdminController@showDrivers')->name('admin.drivers');
    Route::get('admin/maps', 'AdminController@showMaps')->name('admin.maps');
    Route::get('admin/truck/input', 'AdminController@showInput')->name('admin.truck.input');
    Route::post('admin/truck/input', 'AdminController@truckInput');
    Route::get('admin/trucks', 'AdminController@showTrucks')->name('admin.trucks');
    Route::get('admin/truck/{id}/edit', 'AdminController@showTruck')->name('admin.truck.show');
    Route::get('admin/driver/{id}/edit', 'AdminController@showDriver')->name('admin.driver.show');
    Route::put('admin/truck/{id}', 'AdminController@updateTruck')->name('admin.truck.update');
    Route::put('admin/driver/{id}', 'AdminController@updateDriver')->name('admin.driver.update');
        //truck/maps/input/3/12/12/12/0/hello
    /*Route::any('truck/maps/input/{truckNumber}/{truckSpeed}/{truckLat}/{truckLng}/{truckActive}/{password}', ['as' => 'truck.data',function($truckNumber,$truckSpeed,$truckLat,$truckLng,$truckActive,$password){

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
        
    }]);*/

    


});





