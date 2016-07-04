@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection

@section('content')
	<h1>Input truck info</h1>
	<!-- <div id="googleMap"></div> -->
	<form action="/truck/maps/input" class="truck-input" method="POST">
		<div class="form-group">
			<label for="name">Driver's name</label>
			<input type="text" name="name" id="name" >
		</div>
		<div class="form-group">
			<label for="tel">Driver's Phone number</label>
			<input type="tel" name="tel" id="tel" >
		</div>

		<div class="form-group">
			<label for="email">Driver's email</label>
			<input type="email" name="email" id="email" >
		</div>
		
		<div class="form-group">
			<label for="truck-type">Truck Type</label>
			<input type="text" id="truck-type" name="truck-type">
		</div>
		<div class="form-group">
			<label for="truck-model">Truck Model</label>
			<input type="text" id="truck-model" name="truck-model">
		</div>
		<div class="form-group">
			<label for="truck-maker">Truck Maker</label>
			<input type="text" id="truck-maker" name="truck-maker">
		</div>
		<div class="form-group">
			<label for="truck-tons">How much does the Truck weighs (tons)</label>
			<input type="text" id="truck-tons" name="truck-tons">
		</div>
		<div class="form-group">
			<label for="truck-plate">Truck Plate</label>
			<input type="text" id="truck-plate" name="truck-plate">
		</div>
		<div class="form-group">
			<label for="truck-number">Truck number</label>
			<input type="text" id="truck-number" name="truck-number">
		</div>
		<div class="form-group">
			<label for="truck-speed">Truck Speed</label>
			<input type="text" id="truck-speed" name="truck-speed">
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
				<input type="radio" checked="checked" name="truck-active" value="true" id="truck-active-true" /> Yes
			</label>
			<label for="truck-active-false"> 
				<input type="radio" name="truck-active" value="false" id="truck-active-false" /> No
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