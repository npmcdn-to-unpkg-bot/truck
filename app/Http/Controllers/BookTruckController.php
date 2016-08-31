<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Truck;

class BookTruckController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('book.maps');
    }

    public function store()
    {
        return view('book.maps');
    }

    public function show(Truck $truck)
    {

        return view('book.show')->withTruck($truck);
    }

}
