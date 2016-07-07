@extends('layouts.base')

@section('title', 'password/suspend')

@section('sidebar')
    @parent

@endsection

@section('content')
	<h1>password/suspend</h1>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form action="/truck/password/suspend" class="truck_password_suspend" method="POST">
		<div class="form-group">
			<label for="truck_number">Truck number</label>
			<input type="number" id="truck_number" name="truck_number" required="required">
		</div>
		<div class="form-group">
			<label for="truck_password">Truck Password</label>
			<input type="text" id="truck_password" name="truck_password" required="required">
		</div>
		<div class="form-group">
		<label for="">Is the truck suspended</label>
			<label for="truck_suspend_true"> 
				<input type="radio" checked="checked" name="truck_suspend" value="1" id="truck_suspend_true" /> Yes
			</label>
			<label for="truck_suspend_false"> 
				<input type="radio" name="truck_suspend" value="0" id="truck_suspend_false" /> No
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