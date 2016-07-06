@extends('layouts.base')

@section('title', 'Register a truck')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h1>Register a truck</h1>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<form action="/truck/register" class="register-truck" method="POST">
		<div class="form-group">
		 @if ($errors->has('email')) <!--<p class="alert alert-danger">{{ $errors->first('email') }}</p> --> @endif
			<label for="name">Driver's name</label>
			<input type="text" name="name" id="name" >
		</div>
		<div class="form-group">
			<label for="tel">Driver's Phone number</label>
			<input type="tel" name="tel" id="tel" >
		</div>

		<div class="form-group">
			<label for="email">Driver's email</label>
			<input type="email" name="email" id="email">
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
			<input type="number" id="truck-number" name="truck-number">
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
		<div class="form-group">
			<input type="submit" value="Submit">
		</div>
	</form>
@endsection

@section('footer')
    @parent

@endsection