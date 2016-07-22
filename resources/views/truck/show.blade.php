@extends('layouts.base')

@section('title', 'Register a truck')

@section('sidebar')
    @parent

@endsection
@section('page-title')
Truck - {{$truck->id}}
@endsection
@section('content')

	<div class="form-group">
		<h3>Truck Id</h3>
		<h4><i>{{$truck->id}}</i></h4>
	</div>
	<div class="form-group">
		<h3>Truck Manufacture Date</h3>
		<h4><i>{{$truck->manufacture_date}}</i></h4>
	</div>
	<div class="form-group">
		<h3>Truck Model</h3>
		<h4><i>{{$truck->model}}</i></h4>
	</div>
	<div class="form-group">
		<h3>Truck Maker</h3>
		<h4><i>{{$truck->maker}}</i></h4>
	</div>
	<div class="form-group">
		<h3>How much does the Truck weighs (tons)</h3>
		<h4><i>{{$truck->tons}}</i></h4>
	</div>
	<div class="form-group">
		<h3>Truck Plate</h3>
		<h4><i>{{$truck->plate}}</i></h4>
	</div>
	<div class="form-group">
		<h3>Truck Plate State</h3>
		<h4><i>{{$truck->plate_state}}</i></h4>
	</div>
    @if(!empty($truck->password))
    	<div class="form-group">
    		<h3>Truck password</h3>
    		<h4><i>{{$truck->password}}</i></h4>
    	</div>
    @endif

@endsection

@push('scripts')
	<script>
		// function SelectElement(valueToSelect){
		//     var element = document.getElementById('plate_state');
		//     element.value = valueToSelect;
		// }
		// SelectElement("{{$truck->plate_state}}");
	</script>
@endpush

@section('footer')
    @parent

@endsection
