@extends('layouts.base')

@section('title', 'Book a truck')

@section('sidebar')
    @parent

@endsection
@section('page-title', 'Book a truck')
@section('content')
				<form action="/truck/book" class="book_truck">
					<div class="form-group">
						<label for="book_name">Name</label>
						<input type="text" id="book_name">
					</div>
					<div class="form-group">
						<label for="book_date">Date</label>
						<input type="date" id="book_date">
					</div>
					<div class="form-group">
						<label for="book_time">Time</label>
						<input type="time" id="book_time">
					</div>
					<div class="form-group">
						<label for="book_from">From Location</label>
						<input type="text" id="book_from">
					</div>
					<div class="form-group">
						<label for="book_to">To Location</label>
						<input type="text" id="book_to">
					</div>
					<div class="form-group">
						<input type="submit" id="book-submit" value="Book Truck">
					</div>
				</form>
@endsection

@section('footer')
    @parent

@endsection