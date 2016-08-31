@extends('layouts.base')

@section('title', 'Register a truck')

@section('sidebar')
    @parent

@endsection
@section('page-title','Register a User')
@section('content')
    @include('partials._error')
@if ($errors->has('email')) <!--<p class="alert alert-danger">{{ $errors->first('email') }}</p> --> @endif

	<form action="register" class="register_driver" method="POST">
        @if(Auth::check())
        @if(Auth::user()->isAdmin())
    		<div class="form-group">
    			<label for="user_role">user role</label>
    			<select name="user_role" id="user_role" required="required">
    				<option value="">Select the role of the user</option>
    				@foreach(\App\Role::all() as $role )
    					<option value="{{$role->name}}">{{$role->name}}</option>
    				@endforeach
    			</select>
    		</div>
        @endif
        @endif
		<div class="form-group">
			<label for="first_name">First Name <!-- <span class="inline-block px1 white bg-red">Fries</span> --></label>
			<input type="text" name="first_name" id="first_name"  required="required"  value="{{old('first_name')}}">
		</div>
		<div class="form-group">
			<label for="middle_name">Middle Name</label>
			<input type="text" name="middle_name" id="middle_name"  value="{{old('middle_name')}}">
		</div>
		<div class="form-group">
			<label for="surname">Surname</label>
			<input type="text" name="surname" id="surname" required="required" value="{{old('surname')}}">
		</div>
		<div class="form-group">
			<label for="tel">Phone Number</label>
			<input type="tel" name="tel" id="tel"  required="required" value="{{old('tel')}}">
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required="required" value="{{old('email')}}">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" name="password"  required="required">
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
