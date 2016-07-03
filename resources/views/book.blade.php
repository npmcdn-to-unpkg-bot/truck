@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection

@section('content')
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