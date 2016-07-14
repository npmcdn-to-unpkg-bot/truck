@extends('layouts.base')

@section('title', 'Register a truck')

@section('sidebar')
    @parent

@endsection
@section('page-title','Update a truck')
@section('content')
    @if (!empty($success))
    	<div class="msg_success bg-green">{{ $success }}</div>
	@endif
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

	<form action="/admin/truck" class="register-truck" method="POST">
		<div class="form-group">
			<label for="id">Truck Id</label>
			<input type="text" id="id" name="id" required="required" value="{{$truck->id}}" disabled="">
		</div>
		<div class="form-group">
			<label for="manufacture_date">Truck Manufacture Date</label>
			<input type="text" id="manufacture_date" name="manufacture_date" required="required" value="{{$truck->manufacture_date}}" disabled="">
		</div>
		<div class="form-group">
			<label for="model">Truck Model</label>
			<input type="text" id="model" name="model" required="required" value="{{$truck->model}}" disabled="">
		</div>
		<div class="form-group">
			<label for="maker">Truck Maker</label>
			<input type="text" id="maker" name="maker" required="required" value="{{$truck->maker}}" disabled="">
		</div>
		<div class="form-group">
			<label for="tons">How much does the Truck weighs (tons)</label>
			<input type="text" id="tons" name="tons" required="required" value="{{$truck->tons}}" disabled="">
			<!-- <select name="tons" id="tons" required="required">
				<option value="">Select the weight of your truck</option>
				@for ($i = 1; $i <= 30; $i++)
				    			<option value="{{$i}}">{{$i}}</option>
				@endfor
			</select> -->
		</div>
		<div class="form-group">
			<label for="plate">Truck Plate</label>
			<input type="text" id="plate" name="plate" required="required" value="{{$truck->plate}}">
		</div>
		<div class="form-group">
			<label for="plate_state">Truck Plate State</label>
			<select name="plate_state" id="plate_state" required="required" >
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
		{{ method_field('UPDATE') }}
		<div class="form-group">
			<input type="submit" value="Submit">
		</div>
	</form>
@endsection

@section('footer')
    @parent

@endsection