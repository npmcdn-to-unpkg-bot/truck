<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Truck;

class BookTruckController extends Controller
{
    public function index()
    {
    	return view('book.maps');
    }

    public function store()
    {
        return view('book.maps');
    }

    public function show($id)
    {
        $truck = Truck::findOrFail($id);
    	return view('book.show')->with('truck',$truck);
    }

    public function maps()
    {
        $trucks = Truck::active()->toArray();
        return  json_encode(array_values($trucks));
    }
}
