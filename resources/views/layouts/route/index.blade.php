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
	<ol class="breadcrumbs">
		<li><span>Route</span></li>
	</ol>
@endsection

@section('content')
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
			</div>
			<h2 class="panel-title"> <a href="{{ url('Skenario') }}"> {{ $skenario->nama }} </a> | <a href="{{ url('showFlight/'.$flight->id_skenario) }}"> Callsign : {{ $flight->callsign }} | Delay : {{ $flight->delay }} </a></h2>
		</header>
		<div class="panel-body">
			<p>
				<a href="{{ url('createRoute/'.$id_flight) }}">
					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Tambah Route</button>	
				</a>
			</p>

			@if (Session::has('success'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<strong>Sukses</strong> {{ Session::get('success') }}
				</div>
	        @endif
			
			<table class="table table-bordered table-striped mb-none" id="MenuTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Rute</th>
						<th>Create Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 1; @endphp
					@foreach($route as $item)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $item->name }}</td>
							<td>{{ $item->created_at }}</td>
							<td>
								<a href="{{ url('editRoute/'.$item->id) }}">
									<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-warning"> Edit </button>
								</a>
								<form action="{{ route('Route.destroy', $item->id) }}" method="GET" style="display:inline-block;">
                                    <button title="Delete" onclick="return confirm('Anda yakin ?')" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger" type="submit">Delete</button>
                                </form>
								<a href="{{ url('showWaypoint/'.$item->id) }}">
									<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-success"> Waypoint </button>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</section>
@endsection