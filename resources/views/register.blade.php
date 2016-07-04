@extends('layouts.base')

@section('title', 'Register a truck')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h1>Register a truck</h1>
				<form action="#0" class="register-truck">
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
						<input type="submit" id="truck-submit" value="Register Truck">
					</div>
				</form>
@endsection

@section('footer')
    @parent

@endsection