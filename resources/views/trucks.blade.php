@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h1>All trucks</h1>
    @if (count($trucks) > 0)
        @foreach ($trucks as $truck)
            <div class="truck">
            	<ul>
            		<li>
            			<b>Driver's Number: </b>{{ $truck->id }} 
            		</li>
            		<li>
            			<b>Driver's Name: </b>{{ $truck->surname }} {{ $truck->middle_name }} {{ $truck->first_name }}
            		</li>
            		<li>
            			<b>Driver's Plate: </b>{{ $truck->truck_plate }}
            		</li>
            	</ul>
            	
            </div>
        @endforeach
    @endif
@endsection

@section('footer')
    @parent

@endsection