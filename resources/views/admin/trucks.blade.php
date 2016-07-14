@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection
@section('page-title','All trucks')
@section('content')
    @if (count($trucks) > 0)
        <table class="table-light overflow-hidden bg-lighten-4 white">
            <thead>
              <tr>
                <th>Driver's Id</th> <th>Driver's Name</th> <th>Driver's Phone number</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($trucks as $truck)
                  <tr> <td>{{ $truck->id }}</td> <td>{{ $truck->full_name}}</td> <td>{{ $truck->plate }}</td> </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>No truck registered yet</h1>
    @endif
@endsection

@section('footer')
    @parent

@endsection