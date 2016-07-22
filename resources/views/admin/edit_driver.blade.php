@extends('layouts.base')

@section('title', 'Update a driver')

@section('sidebar')
    @parent

@endsection
@section('page-title','Update a driver')
@section('content')
    @if (!empty($success))
    	<div class="alert bg-green">{{ $success }}</div>
	@endif
    @if (count($errors) > 0)
    <div class="alert bg-red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<form action="/admin/driver/{{$driver->id}}/edit" class="register_driver" method="POST">
		<div class="form-group">
			<label for="first_name">First Name <!-- <span class="inline-block px1 white bg-red">Fries</span> --></label>
			<input type="text" name="first_name" id="first_name"  required="required"  value="{{$driver->first_name}}" >
		</div>
		<div class="form-group">
			<label for="middle_name">Middle Name</label>
			<input type="text" name="middle_name" id="middle_name"  value="{{$driver->middle_name}}">
		</div>
		<div class="form-group">
			<label for="surname">Surname</label>
			<input type="text" name="surname" id="surname" required="required" value="{{$driver->surname}}"> 
		</div>
		<div class="form-group">
			<label for="tel">Phone Number</label>
			<input type="tel" name="tel" id="tel"  required="required" value="{{$driver->tel}}">
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required="required" value="{{$driver->email}}">
		</div>
		<div class="form-group">
		<label for="">Is the driver supended</label>
			<label for="supended_true"> 
				<input type="radio"  name="supended" value="1" id="supended_true" /> Yes
			</label>
			<label for="supended_false"> 
				<input type="radio" name="supended" value="0" id="supended_false" checked="checked"/> No
			</label>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
		{{ method_field('PUT') }}
		<div class="form-group">
			<input type="submit" value="Submit">
		</div>
	</form>
@endsection

@section('footer')
    @parent

@endsection