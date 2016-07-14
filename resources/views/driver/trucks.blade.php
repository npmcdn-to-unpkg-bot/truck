@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection
@section('page-title','All trucks')
@section('content')
    <h1></h1>
    @if (count($trucks) > 0)
        @foreach ($trucks as $truck)
            <div class="truck">
            	<ul>
            		<li>
            			<b>Driver's Id: </b>{{ $truck->id }} 
            		</li>
            		<li>
            			<b>Driver's Name: </b>{{ $truck->driver['full_name'] }}
            		</li>
            		<li>
            			<b>Truck Plate: </b>{{ $truck->plate }}
            		</li>
            	</ul>
            	
            </div>
        @endforeach
    @endif
@endsection

@section('footer')
    @parent

@endsection