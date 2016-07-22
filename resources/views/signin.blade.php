@extends('layouts.base')

@section('title', 'Register a truck')

@section('sidebar')
    @parent

@endsection
@section('page-title', 'Sign In')
@section('content')
    @include('partials._error')
@if ($errors->has('email')) <!--<p class="alert alert-danger">{{ $errors->first('email') }}</p> --> @endif

	<form action="/signin" class="signin" method="POST">

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required="required" value="{{old('email')}}" class="field">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required="required" class="field">
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
