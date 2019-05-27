@extends('layouts.dashboard')

@section('titleheadercontent')
	<h2>Dashboard</h2>
@endsection

@section('headercontent')
	<ol class="breadcrumbs">
		<li><span>Waypoint</span></li>
		<li><span>Tambah</span></li>
	</ol>
@endsection

@section('content')

	<div class="col-md-12">
		<form id="form1" method="post" class="form-horizontal" action="{{ route('Waypoint.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					</div>

					<h2 class="panel-title">Tambah Waypoint</h2>
				</header>
				<div class="panel-body">
					@if (Session::has('danger'))
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<strong>Gagal</strong> {{ Session::get('danger') }}
						</div>
			        @endif

					<div class="form-group">
						<label class="col-sm-2 control-label">Nama </label>
						<div class="col-sm-6">
							<input type="text" name="name" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">X </label>
						<div class="col-sm-6">
							<input type="text" name="x" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Y </label>
						<div class="col-sm-6">
							<input type="text" name="y" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Alt </label>
						<div class="col-sm-6">
							<input type="text" name="alt" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Speed </label>
						<div class="col-sm-6">
							<input type="text" name="speed" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Delay </label>
						<div class="col-sm-6">
							<input type="text" name="delay" class="form-control" required>
						</div>
					</div>
					
					<input type="hidden" name="id_route" value="{{ $id_route }}">
					<input type="hidden" name="id_flight" value="{{ $route->id_flight }}">
					<input type="hidden" name="id_skenario" value="{{ $route->id_skenario }}">
					
				</div>
				<footer class="panel-footer">
					<button class="btn btn-primary">Simpan </button>
					<button type="reset" class="btn btn-default">Reset</button>
				</footer>
			</section>
		</form>
	</div>
@endsection