@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection
@section('page-title','All drivers')
@section('content')
    @if (count($drivers) > 0)
        <table class="table-light overflow-hidden bg-lighten-4 white">
            <thead>
              <tr>
                <th>Driver's Id</th> <th>Driver's Name</th> <th>Driver's Phone number</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                  <tr> <td>{{ $driver->id }}</td> <td>{{ $driver->surname }} {{ $driver->middle_name }} {{ $driver->first_name }}</td> <td>{{ $driver->tel }}</td> </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

@section('footer')
    @parent

@endsection