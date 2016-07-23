@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection
@section('page-title','All drivers')
@section('content-class','content-table')
@section('content')
    @if (count($drivers) > 0)
        <table class="table-light overflow-hidden bg-lighten-4 white">
            <thead>
              <tr>
                <th>Driver's Id</th> <th>Driver's Name</th> <th>Driver's Phone number</th> <th>Driver's Email</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                  <tr> <td>{{ $driver->id }}</td> <td>{{ $driver->surname }} {{ $driver->middle_name }} {{ $driver->first_name }}</td> <td>{{ $driver->tel }}</td> <td>{{ $driver->email }}</td></tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No driver registered yet</h1>
    @endif
@endsection

@section('footer')
    @parent

@endsection
