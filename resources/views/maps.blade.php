@extends('layouts.base')

@section('title', 'Maps of truck')

@section('sidebar')
    @parent

@endsection

@section('content')
	<h1>Maps of truck</h1>
	<div id="googleMap"></div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
	<script>
		/*var data =  {!!App\Truck::with('data')->get()->toJson()!!}; */
		
	</script>
@endsection

@section('footer')
    @parent

@endsection