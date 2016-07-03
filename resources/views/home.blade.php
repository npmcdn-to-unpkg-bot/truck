@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h1>Register a truck</h1>
				<form action="#0" class="register-truck">
					<div class="form-group">
						<label for="truck-type">Truck Type</label>
						<input type="text" id="truck-type">
					</div>
					<div class="form-group">
						<label for="truck-model">Truck Model</label>
						<input type="text" id="truck-model">
					</div>
					<div class="form-group">
						<label for="truck-maker">Truck Maker</label>
						<input type="text" id="truck-maker">
					</div>
					<div class="form-group">
						<label for="truck-tons">How much does the Truck weighs (tons)</label>
						<input type="text" id="truck-tons">
					</div>
					<div class="form-group">
						<label for="truck-plate">Truck Plate</label>
						<input type="text" id="truck-plate">
					</div>
					<div class="form-group">
						<input type="submit" id="truck-submit" value="Register Truck">
					</div>
				</form>
			<h1>Book a truck</h1>
				<form action="#0" class="book-truck">
					<div class="form-group">
						<label for="book-name">Name</label>
						<input type="text" id="book-name">
					</div>
					<div class="form-group">
						<label for="book-date">Date</label>
						<input type="date" id="book-date">
					</div>
					<div class="form-group">
						<label for="book-time">Time</label>
						<input type="time" id="book-time">
					</div>
					<div class="form-group">
						<label for="book-from">From Location</label>
						<input type="text" id="book-from">
					</div>
					<div class="form-group">
						<label for="book-to">To Location</label>
						<input type="text" id="book-to">
					</div>
					<div class="form-group">
						<input type="submit" id="book-submit" value="Book Truck">
					</div>
				</form>
@endsection

@section('footer')
    @parent

@endsection