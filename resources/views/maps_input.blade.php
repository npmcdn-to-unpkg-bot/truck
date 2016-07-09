@extends('layouts.base')

@section('title', 'Maps Input')

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
	@if (!empty($success))
    	<div class="msg_success bg-green">{{ $success }}</div>
	@endif
	<form action="/truck/maps/input" class="truck_input" method="POST">
		<div class="form-group">
			<label for="truck_number">Truck number</label>
			<input type="number" id="truck_number" name="truck_number" required="required">
		</div>
		<div class="form-group">
			<label for="truck_speed">Truck Speed</label>
			<input type="number" id="truck_speed" name="truck_speed" required="required">
		</div>
		<div class="form-group">
			<label for="truck_lat">Truck latitude</label>
			<input type="text" id="truck_lat" name="truck_lat" required="required">
		</div>
		<div class="form-group">
			<label for="truck_lng">Truck longitude</label>
			<input type="text" id="truck_lng" name="truck_lng" required="required">
		</div>
		<div class="form-group">
		<label for="">Is the truck active</label>
			<label for="truck_active_true"> 
				<input type="radio" checked="checked" name="truck_active" value="1" id="truck_active_true" /> Yes
			</label>
			<label for="truck_active_false"> 
				<input type="radio" name="truck_active" value="0" id="truck_active_false" /> No
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