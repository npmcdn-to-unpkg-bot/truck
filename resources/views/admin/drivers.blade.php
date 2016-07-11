@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h1>All drivers</h1>
    @if (count($drivers) > 0)
        @foreach ($drivers as $driver)
            <div class="driver">
            	<ul>
            		<li>
            			<b>Driver's Number: </b>{{ $driver->id }} 
            		</li>
            		<li>
            			<b>Driver's Name: </b>{{ $driver->surname }} {{ $driver->middle_name }} {{ $driver->first_name }}
            		</li>
            		<li>
            			<b>Driver's Phone number: </b>{{ $driver->tel }}
            		</li>
            	</ul>
            	
            </div>
        @endforeach
    @endif
@endsection

@section('footer')
    @parent

@endsection