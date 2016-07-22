@extends('layouts.base')

@section('title', 'Register a truck')

@section('sidebar')
    @parent

@endsection
@section('page-title')
Book Truck  <i class="h3 italic m0"> - weighs {{$truck->tons}} tons</i>
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
		<h3>How much the Truck weighs (tons)</h3>
		<h4><i>{{$truck->tons}}</i></h4>
	</div>
    <form action="{{route('truck.book')}}" class="book_truck" method="post">
		<div class="form-group">
			<label for="book_name">Name</label>
			<input type="text" id="book_name">
		</div>
		<div class="form-group">
			<label for="book_time">Time to load <i class="red">* please allow one hour after booking</i></label>
			<input  type="time"
                    id="book_time"><br />
                    <input  type="date"
                            id="book_time">
		</div>
		<div class="form-group">
			<label for="book_from">From Location</label>
			<input type="text" id="book_from">
		</div>
		<div class="form-group">
			<label for="book_to">To Location</label>
			<input type="text" id="book_to">
		</div>
		<div class="form-group">
			<input type="submit" id="book-submit" value="Book Truck">
		</div>
        {{csrf_field()}}
	</form>
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
