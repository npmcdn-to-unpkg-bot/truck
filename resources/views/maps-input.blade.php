@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection

@section('content')
	<h1>Input truck info</h1>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form action="/truck/maps/input" class="truck-input" method="POST">
		<div class="form-group">
			<label for="truck-number">Truck number</label>
			<input type="number" id="truck-number" name="truck-number">
		</div>
		<div class="form-group">
			<label for="truck-speed">Truck Speed</label>
			<input type="number" id="truck-speed" name="truck-speed">
		</div>
		<div class="form-group">
			<label for="truck-lat">Truck latitude</label>
			<input type="text" id="truck-lat" name="truck-lat">
		</div>
		<div class="form-group">
			<label for="truck-lng">Truck longitude</label>
			<input type="text" id="truck-lng" name="truck-lng">
		</div>
		<div class="form-group">
		<label for="">Is the truck active</label>
			<label for="truck-active-true"> 
				<input type="radio" checked="checked" name="truck-active" value="1" id="truck-active-true" /> Yes
			</label>
			<label for="truck-active-false"> 
				<input type="radio" name="truck-active" value="0" id="truck-active-false" /> No
			</label>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<input type="submit" value="Submit">
		</div>
	</form>
@endsection

@section('footer')
    @parent

@endsection