@extends('layouts.base')

@section('title', 'Maps Input')

@section('sidebar')
    @parent

@endsection
@section('page-title','Input truck info')
@section('content')
	@include('partials._error')
	<form action="{{route('truck.input.store')}}" class="admin_input" method="POST">
		<div class="form-group">
			<label for="id">Truck Id</label>
			<input type="number" id="id" name="id" required="required" value="{{old('id')}}">
		</div>
		<div class="form-group">
			<label for="speed">Truck Speed</label>
			<input type="number" id="speed" name="speed" required="required" value="{{old('speed')}}">
		</div>
		<div class="form-group">
			<label for="lat">Truck latitude</label>
			<input type="text" id="lat" name="lat" required="required" value="{{old('lat')}}">
		</div>
		<div class="form-group">
			<label for="lng">Truck longitude</label>
			<input type="text" id="lng" name="lng" required="required" value="{{old('lng')}}">
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
