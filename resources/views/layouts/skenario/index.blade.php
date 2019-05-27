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
		<li><span>List Scenario</span></li>
	</ol>
@endsection

@section('content')
	<br>
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
			</div>
	
			<h2 class="panel-title">List Scenario</h2>
		</header>
		<div class="panel-body">
			<p>
				<a href="{{ url('createSkenario') }}">
					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Tambah</button>	
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
						<th>Scenario</th>
						<th>Create Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 1; @endphp
					@foreach($skenario as $item)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $item->nama }}</td>
							<td>{{ $item->created_at }}</td>
							<td>
								<form action="{{ route('Skenario.destroy', $item->id) }}" method="GET" style="display:inline-block;">
                                    <button title="Delete" onclick="return confirm('Anda yakin ?')" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger" type="submit">Delete</button>
                                </form>
								<a href="{{ url('showFlight/'.$item->id) }}">
									<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-success"> Detail </button>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>
@endsection

<script>
	function copyText(id) {
  		var copyText = document.getElementById("url-"+id);
  		copyText.select();
  		document.execCommand("copy");
  		alert("Copied the text: " + copyText.value);
  		 
	}
</script>