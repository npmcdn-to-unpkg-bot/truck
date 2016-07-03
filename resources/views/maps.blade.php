@extends('layouts.base')

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection

@section('content')
	<h1>Maps of truck</h1>
	<div id="googleMap"></div>
@endsection

@section('footer')
    @parent

@endsection