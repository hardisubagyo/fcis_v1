@extends('layouts.dashboard')

@section('titleheadercontent')
	<h2>Dashboard</h2>
@endsection

@section('headercontent')
	<ol class="breadcrumbs">
		<li><span>Rute</span></li>
		<li><span>Ubah</span></li>
	</ol>
@endsection

@section('content')
	<br>
	<div class="col-md-12">
		<form id="form1" method="post" class="form-horizontal" action="{{ route('Flight.update', $data->id) }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					</div>

					<h2 class="panel-title">Ubah Rute</h2>
				</header>
				<div class="panel-body">
					@if (Session::has('danger'))
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<strong>Gagal</strong> {{ Session::get('danger') }}
						</div>
			        @endif

					<div class="form-group">
						<label class="col-sm-2 control-label">Callsign </label>
						<div class="col-sm-6">
							<input type="text" name="callsign" class="form-control" value="{{ $data->callsign }}" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Delay </label>
						<div class="col-sm-6">
							<input type="text" name="delay" class="form-control" value="{{ $data->delay }}" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Rute </label>
						<div class="col-sm-6">
							<input type="text" name="rute" class="form-control" value="{{ $data->rute }}" required>
						</div>
					</div>

					<input type="hidden" name="id_skenario" value="{{ $data->id_skenario }}">
					
				</div>
				<footer class="panel-footer">
					<button class="btn btn-primary">Simpan </button>
					<button type="reset" class="btn btn-default">Reset</button>
				</footer>
			</section>
		</form>
	</div>
@endsection