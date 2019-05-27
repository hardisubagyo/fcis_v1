@extends('layouts.dashboard')

@section('titleheadercontent')
	<h2>Dashboard</h2>
@endsection

@section('headercontent')
	<ol class="breadcrumbs">
		<li><span>List Pengguna</span></li>
		<li><span>Ubah</span></li>
	</ol>
@endsection

@section('content')

	<div class="col-md-12">
		<form id="form1" method="post" class="form-horizontal" action="{{ route('Users.update', $data->id) }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					</div>

					<h2 class="panel-title">Ubah List Pengguna</h2>
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
							<input type="text" name="nama" class="form-control" required value="{{ $data->name }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Username </label>
						<div class="col-sm-6">
							<input type="text" name="username" class="form-control" required value="{{ $data->username }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email </label>
						<div class="col-sm-6">
							<input type="email" name="email" class="form-control" required value="{{ $data->email }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Password </label>
						<div class="col-sm-6">
							<input type="password" name="password" class="form-control">
							<span class="help-block"> Isi Jika Ingin Mengganti Password </span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Repassword </label>
						<div class="col-sm-6">
							<input type="password" name="repassword" class="form-control">
							<span class="help-block"> Isi Jika Ingin Mengganti Password </span>
						</div>
					</div>
					
				</div>
				<footer class="panel-footer">
					<button class="btn btn-primary">Simpan </button>
					<button type="reset" class="btn btn-default">Reset</button>
				</footer>
			</section>
		</form>
	</div>
@endsection