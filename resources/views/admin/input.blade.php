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
	<form action="/admin/truck/input" class="admin_input" method="POST">
		<div class="form-group">
			<label for="id">Truck Id</label>
			<input type="number" id="id" name="id" required="required" value{{old('id')}}>
		</div>
		<div class="form-group">
			<label for="speed">Truck Speed</label>
			<input type="number" id="speed" name="speed" required="required" value{{old('speed')}}>
		</div>
		<div class="form-group">
			<label for="lat">Truck latitude</label>
			<input type="text" id="lat" name="lat" required="required" value{{old('lat')}}>
		</div>
		<div class="form-group">
			<label for="lng">Truck longitude</label>
			<input type="text" id="lng" name="lng" required="required" value{{old('lng')}}>
		</div>
		<div class="form-group">
		<label for="">Is the truck active</label>
			<label for="active_true"> 
				<input type="radio" checked="checked" name="active" value="1" id="active_true" /> Yes
			</label>
			<label for="active_false"> 
				<input type="radio" name="active" value="0" id="active_false" /> No
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