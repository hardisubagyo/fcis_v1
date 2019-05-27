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
		<li><span>Flight</span></li>
	</ol>
@endsection

@section('content')
	<br>
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
			</div>
			<h2 class="panel-title">Skenario</h2>
		</header>
		<div class="panel-body">
			<form id="form1" method="post" class="form-horizontal" action="{{ route('Skenario.update', $skenario->id) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				
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
							<input type="text" name="nama" class="form-control" required value="{{ $skenario->nama }}">
						</div>
					</div>
					
				</div>
				<footer class="panel-footer">
					<button class="btn btn-primary">Simpan </button>
				</footer>
				
			</form>
			
		</div>
	</section>

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
			</div>
			<h2 class="panel-title">Flight</h2>
		</header>
		<div class="panel-body">

			@if (Session::has('success'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<strong>Sukses</strong> {{ Session::get('success') }}
				</div>
	        @endif
	        
			@if (Session::has('danger'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<strong>Gagal</strong> {{ Session::get('danger') }}
				</div>
	        @endif

	        <p>
	        	<a href="#addflight" data-toggle="modal" class="edit">
		            <button class="btn btn-primary">
		                <i class="fa fa-plus" aria-hidden="true"></i> Tambah
		            </button>
		        </a>
	        </p>

	        <div class="modal fade" id="addflight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Flight</h5>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="form-group">
										<label class="col-sm-2 control-label">Callsign </label>
										<div class="col-sm-6">
											<input type="text" name="callsign" id="callsign" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Delay </label>
										<div class="col-sm-6">
											<input type="text" name="delay" id="delay" class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Rute </label>
										<div class="col-sm-6">
											<input type="text" name="rute" id="rute" class="form-control" required>
										</div>
									</div>

									<input type="hidden" name="id_skenario" id="id_skenario" value="{{ $skenario->id }}">
                                    
                                </div>
                                <footer class="panel-footer">
                                    <button class="btn btn-primary" onclick="tambahflight();">Simpan </button>
                                </footer>
                            </section>
                        </div>
                    </div>
                </div>
            </div>

			<table class="table table-bordered table-striped mb-none" id="MenuTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Callsign</th>
						<th>Delay</th>
						<th>Rute</th>
						<th>Create Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php $no = 1; @endphp
					@foreach($flight as $item)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $item->callsign }}</td>
							<td>{{ $item->delay }}</td>
							<td>{{ $item->rute }}</td>
							<td>{{ $item->created_at }}</td>
							<td>
								<a href="#editFlight" data-toggle="modal" class="edit" data-id="{{ $item->id }}" data-callsignup="{{ $item->callsign }}" data-delayup="{{ $item->delay }}" data-ruteup="{{ $item->rute }}" data-idskenario="{{ $item->id_skenario }}">
                                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-warning"> Edit </button>
                                </a>
								<!-- <a href="{{ url('editFlight/'.$item->id) }}">
									<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-warning"> Edit </button>
								</a> -->
								<form action="{{ route('Flight.destroy', $item->id) }}" method="GET" style="display:inline-block;">
                                    <button title="Delete" onclick="return confirm('Anda yakin ?')" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger" type="submit">Delete</button>
                                </form>
								<a href="{{ url('showWaypoint/'.$skenario->id.'/'.$item->id) }}">
									<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-success"> Waypoint </button>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class="modal fade" id="editFlight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Flight</h5>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <section class="panel">
                                <div class="panel-body">
                                    
                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="idskenario" id="idskenario">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Callsign </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="callsign" id="callsign_up" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Delay </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="delay" class="form-control" id="delay_up" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Rute </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="rute" id="rute_up" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <footer class="panel-footer">
                                    <button class="btn btn-primary" onclick="simpanperubahan();">Simpan </button>
                                </footer>
                            </section>
                        </div>
                    </div>

                </div>
            </div>

            <script type="text/javascript">
                $(document).on("click", ".edit", function () {
                    var id = $(this).data('id');
                    var callsign_up = $(this).data('callsignup');
                    var delay_up = $(this).data('delayup');
                    var rute_up = $(this).data('ruteup');
                    var idskenario = $(this).data('idskenario');

                    $(".modal-body #id").val( id );
                    $(".modal-body #callsign_up").val( callsign_up );
                    $(".modal-body #delay_up").val( delay_up );
                    $(".modal-body #rute_up").val( rute_up );
                    $(".modal-body #idskenario").val( idskenario );
                });

                function simpanperubahan(){
                    var id = document.getElementById("id").value;
                    var callsignup = document.getElementById("callsign_up").value;
                    var delayup = document.getElementById("delay_up").value;
                    var ruteup = document.getElementById("rute_up").value;
                    var idskenarioup = document.getElementById("idskenario").value;

                    //alert(id + ' - ' + callsign_up + ' - ' + delay_up + ' - ' + rute_up + ' - ' + idskenario_up);

                    $.ajax({
                        url  : '{{ url("updateFlight") }}',
                        type : 'post',
                        data: {
                            'id': id,
                            'callsign': callsignup,
                            'delay': delayup,
                            'rute': ruteup,
                            'idskenario': idskenarioup,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(data){
                            if(data == 'true'){
                                alert("Berhasil diubah");
                                location.reload();
                            }else{
                                alert("Gagal diubah");
                            }
                        },
                        error: function(error){
                            console.log(error);  
                        }
                    });
                    return false;
                }
            </script>
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

	function tambahflight(){
		var callsign = document.getElementById("callsign").value;
		var delay = document.getElementById("delay").value;
		var rute = document.getElementById("rute").value;
		var id_skenario = document.getElementById("id_skenario").value;

		$.ajax({
            url  : '{{ route("Flight.store") }}',
            type : 'post',
            data: {
                'callsign': callsign,
                'delay': delay,
                'rute': rute,
                'id_skenario': id_skenario,
                '_token': '{{ csrf_token() }}'
            },
            success: function(data){
                if(data == 'true'){
                    alert("Berhasil ditambah");
                    location.reload();
                }else{
                    alert("Gagal diubah");
                }
            },
            error: function(error){
                console.log(error);  
            }
        });
        return false;

		/*alert(callsign + ' - ' + delay + ' - ' + ' - ' + rute + ' - ' + id_skenario);*/
	}
</script>