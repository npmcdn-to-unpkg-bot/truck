@extends('layouts.base')

@section('title', 'Maps of truck')

@push('scripts')
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCn5ARfEvG7ivp5u-yX80YZF1DKHd8u7n4"></script>
	<script src="/js/maps.js"></script>
@endpush

@section('sidebar')
    @parent
	<button onclick="window.location.reload()">Refresh</button>
@endsection

@section('content')
	<h1>Maps of truck</h1>
	<div id="googleMap"></div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
@endsection

@section('footer')
    @parent
@endsection