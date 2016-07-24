@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection
@section('page-title','All trucks')
    @section('content-class','content-table')
@section('content')
    @if (count($trucks) > 0)
        <table class="table-light overflow-hidden bg-lighten-4 white">
            <thead>
              <tr>
                <th>Truck Id</th> <th>Driver's Name</th> <th>Truck plate</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($trucks as $truck)
                  <tr> <td><a href="{{route('truck.show',$truck->id)}}">{{ $truck->id }}</a></td> <td>{{ $truck->driver->surname}} {{ $truck->driver->first_name}}</td> <td>{{ $truck->plate }}</td> </tr>
                @endforeach
            </tbody>
        </table>
        <nav class="nav-links">

            @if(1 != $trucks->currentPage() )

                <a href="{{$trucks->previousPageUrl()}}" class="nav-link nav-link-prev">Previous page</a>
            @endif
            @if($trucks->hasMorePages())
                <a href="{{$trucks->nextPageUrl()}}" class="nav-link nav-link-next">Next page</a>
            @endif
        </nav>
    @else
        <h1>No trucks found</h1>
    @endif
@endsection

@section('footer')
    @parent

@endsection
