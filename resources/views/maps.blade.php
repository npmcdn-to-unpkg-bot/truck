@extends('layouts.base')

@section('title', 'Maps of truck')

@push('scripts')
    <script src="//maps.googleapis.com/maps/api/js?key={{env('MAPS_API_KEY')}}"></script>
	<script src="/js/maps.js"></script>
@endpush

@push('styles')
    <style media="screen">
        .main-content{
            padding:0px;
        }

        #googleMap{
            height: 100%;
        }
    </style>
@endpush

@section('sidebar')
    @parent
	<div id="refresh_map" class="btn btn-primary bg-darken-4 not-rounded">Refresh</div>
@endsection
@section('page-title','Maps of truck')
@section('content')
	<div id="googleMap"></div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
@endsection

@section('footer')
    @parent
@endsection
