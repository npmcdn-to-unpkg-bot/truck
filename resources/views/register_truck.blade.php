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
@if ($errors->has('email')) <!--<p class="alert alert-danger">{{ $errors->first('email') }}</p> --> @endif

	<form action="/truck/register" class="register-truck" method="POST">
		<div class="form-group">
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" id="first_name"  required="required">
		</div>
		<div class="form-group">
			<label for="middle_name">Middle Name</label>
			<input type="text" name="middle_name" id="middle_name" >
		</div>
		<div class="form-group">
			<label for="surname">Surname</label>
			<input type="text" name="surname" id="surname" required="required"> 
		</div>
		<div class="form-group">
			<label for="tel">Phone Number</label>
			<input type="tel" name="tel" id="tel"  required="required">
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required="required">
		</div>
		
		<div class="form-group">
			<label for="truck_manufacture_date">Truck Manufacture Date</label>
			<input type="text" id="truck_manufacture_date" name="truck_manufacture_date">
		</div>
		<div class="form-group">
			<label for="truck_model">Truck Model</label>
			<input type="text" id="truck_model" name="truck_model">
		</div>
		<div class="form-group">
			<label for="truck_maker">Truck Maker</label>
			<input type="text" id="truck_maker" name="truck_maker">
		</div>
		<div class="form-group">
			<label for="truck_tons">How much does the Truck weighs (tons)</label>
			<select name="truck_tons" id="truck_tons" required="required">
				<option value="">Select the weight of your truck</option>
				@for ($i = 1; $i <= 30; $i++)
	    			<option value="{{$i}}">{{$i}}</option>
				@endfor
			</select>
		</div>
		<div class="form-group">
			<label for="truck_plate">Truck Plate</label>
			<input type="text" id="truck_plate" name="truck_plate" required="required">
		</div>
		<div class="form-group">
			<label for="truck_plate_state">Truck Plate State</label>
			<select name="truck_plate_state" id="truck_plate_state" required="required">
				<option value="">Select your State</option>
				<option value="Abia">Abia</option>
				<option value="Adamawa">Adamawa</option>
				<option value="Akwa Ibom">Akwa Ibom</option>
				<option value="Anambra">Anambra</option>
				<option value="Bauchi">Bauchi</option>
				<option value="Bayelsa">Bayelsa</option>
				<option value="Benue">Benue</option>
				<option value="Borno">Borno</option>
				<option value="Cross River">Cross River</option>
				<option value="Delta">Delta</option>
				<option value="Ebonyi">Ebonyi</option>
				<option value="Edo">Edo</option>
				<option value="Ekiti">Ekiti</option>
				<option value="Enugu">Enugu</option>
				<option value="FCT">FCT</option>
				<option value="Gombe">Gombe</option>
				<option value="Imo">Imo</option>
				<option value="Jigawa">Jigawa</option>
				<option value="Kaduna">Kaduna</option>
				<option value="Kano">Kano</option>
				<option value="Kastina">Kastina</option>
				<option value="Kebbi">Kebbi</option>
				<option value="Kogi">Kogi</option>
				<option value="Kwara">Kwara</option>
				<option value="Lagos">Lagos</option>
				<option value="Nasarawa">Nasarawa</option>
				<option value="Niger">Niger</option>
				<option value="Ogun">Ogun</option>
				<option value="Ondo">Ondo</option>
				<option value="Osun">Osun</option>
				<option value="Oyo">Oyo</option>
				<option value="Plateau">Plateau</option>
				<option value="Rivers">Rivers</option>
				<option value="Sokoto">Sokoto</option>
				<option value="Taraba">Taraba</option>
				<option value="Yobe">Yobe</option>
				<option value="Zamfara">Zamfara</option>
			</select>

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