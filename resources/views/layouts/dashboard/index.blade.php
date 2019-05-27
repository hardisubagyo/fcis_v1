<style type="text/css">
	.offscreen {
	    position: absolute;
	    left: -999em;
	}
</style>
@extends('layouts.dashboard')

@section('titleheadercontent')
	<h2>Dashboard</h2>
@endsection

@section('headercontent')
	
@endsection

@section('content')
	<section class="panel">
		<img src="{{ asset('images/dashboard.png') }}" class="img-responsive">		
	</section>
@endsection