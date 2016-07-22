@extends('layouts.base')
@push('scripts')
    <script src="//maps.googleapis.com/maps/api/js?key={{env('MAPS_API_KEY')}}"></script>
	<script src="/js/book.maps.js"></script>
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

@section('title', 'Book a truck')

@section('sidebar')
    @parent

@endsection
@section('page-title', 'Book a truck')
@section('content')
    <div id="googleMap"></div>
    {{csrf_field()}}

@endsection

@section('footer')
    @parent

@endsection
