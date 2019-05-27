<style type="text/css">
  .offscreen {
      position: absolute;
      left: -999em;
  }

  .leaflet-tooltip.my-labels {
      background-color: transparent;
      border: transparent;
      box-shadow: none;
      
  }
</style>

<!-- <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}">
<link rel="stylesheet" href="{{ asset('leaflet/leaflet.label.css') }}">
<script src="{{ asset('leaflet/leaflet.js') }}"></script>
<script src="{{ asset('leaflet/leaflet.label.js') }}"></script>
<script src="{{ asset('leaflet/Leaflet.TileLayer.MBTiles.js') }}"></script>
<script src="{{ asset('leaflet/sql.js') }}"></script> -->
<!-- <script src="{{ asset('leaflet/leaflet-src.js') }}"></script> -->

<link href="{{ asset('leaflet_v1/leaflet.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('leaflet_v1/leaflet-src.js') }}"></script>
<script src="{{ asset('leaflet_v1/sql.js') }}"></script>
<script src="{{ asset('leaflet_v1/Leaflet.TileLayer.MBTiles.js') }}"></script>
<script src="{{ asset('leaflet/leaflet.label.js') }}"></script>
<!-- <script src="{{ asset('leaflet/leaflet.js') }}"></script> -->

<script src="{{ asset('showWaypoint/indonesia.json') }}" type="text/javascript"></script>
<script src="{{ asset('showWaypoint/ibukota_provinsi.json') }}" type="text/javascript"></script>

<script src="{{ asset('template_admin/assets/vendor/jquery/jquery.js') }}"></script>

@extends('layouts.dashboard')

@section('titleheadercontent')
    <h2>Dashboard</h2>
@endsection

@section('headercontent')
    <ol class="breadcrumbs">
        <li><span>Waypoint</span></li>
    </ol>
@endsection

@section('content')
    <br>
    <!-- SKENARIO -->
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

    <!-- FLIGTH -->
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

                                    <input type="text" name="id_skenario_fligth" id="id_skenario_fligth" value="{{ $id_skenario }}">
                                    
                                </div>
                                <footer class="panel-footer">
                                    <button class="btn btn-primary" onclick="tambahflight();">Simpan </button>
                                </footer>
                            </section>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function tambahflight(){
                    var callsign = document.getElementById("callsign").value;
                    var delay = document.getElementById("delay").value;
                    var rute = document.getElementById("rute").value;
                    var id_skenario_fligth = document.getElementById("id_skenario_fligth").value;

                    //alert(callsign + ' - ' + delay + ' - ' +  rute + ' - ' + id_skenario_fligth);

                    $.ajax({
                        url  : '{{ route("Flight.store") }}',
                        type : 'post',
                        data: {
                            'callsign': callsign,
                            'delay': delay,
                            'rute': rute,
                            'id_skenario': id_skenario_fligth,
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
                }
            </script>

            <table class="table table-bordered table-striped mb-none" id="MenuTable1">
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
                                <!-- <a href="{{ url('editFlight/'.$item->id) }}">
                                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-warning"> Edit </button>
                                </a> -->
                                <a href="#editFlight" data-toggle="modal" class="editf" data-id="{{ $item->id }}" data-callsignup="{{ $item->callsign }}" data-delayup="{{ $item->delay }}" data-ruteup="{{ $item->rute }}" data-idskenario="{{ $item->id_skenario }}">
                                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-warning"> Edit </button>
                                </a>
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
                                    <button class="btn btn-primary" onclick="simpanperubahanflight();">Simpan </button>
                                </footer>
                            </section>
                        </div>
                    </div>

                </div>
            </div>

            <script type="text/javascript">
                $(document).on("click", ".editf", function () {
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

                function simpanperubahanflight(){
                    var id = document.getElementById("id").value;
                    var callsignup = document.getElementById("callsign_up").value;
                    var delayup = document.getElementById("delay_up").value;
                    var ruteup = document.getElementById("rute_up").value;
                    var idskenarioup = document.getElementById("idskenario").value;

                    //alert(id + ' - ' + callsignup + ' - ' + delayup + ' - ' + ruteup + ' - ' + idskenarioup);

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

    <!-- WAYPOINT -->
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            </div>
            <h2 class="panel-title">
                Waypoint
                | Callsign : {{ $get->callsign }} | Delay : {{ $get->delay }} | Rute : {{ $get->rute }}
            </h2>
        </header>
        <div class="panel-body">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Sukses</strong> {{ Session::get('success') }}
                </div>
            @endif
            <div class="row">

                <div class="col-md-6">
                    <table class="table table-bordered table-striped mb-none" id="MenuTable">
                        <thead>
                          <tr>
                            <th>No Urut</th>
                            <th>Name</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Alt</th>
                            <th>Speed</th>
                            <th>Delay</th>
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach($waypoint as $item)
                            <tr>
                                <td>{{ $item->no_urut }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->x }}</td>
                                <td>{{ $item->y }}</td>
                                <td>{{ $item->alt }}</td>
                                <td>{{ $item->speed }}</td>
                                <td>{{ $item->delay }}</td>
                                <td>
                                    
                                    <a href="#editWaypoint" data-toggle="modal" class="edit" data-id="{{ $item->id }}" data-x="{{ $item->x }}" data-y="{{ $item->y }}" data-alt="{{ $item->alt }}" data-speed="{{ $item->speed }}" data-delay="{{ $item->delay }}" data-name="{{ $item->name }}" data-nourut="{{ $item->no_urut }}" data-idflight="{{ $item->id_flight }}" data-idskenario="{{ $item->id_skenario }}">
                                        <button title="Delete" class="mb-xs mt-xs mr-xs btn btn-xs btn-warning" type="submit">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>

                                    <form action="{{ route('Waypoint.destroy', $item->id) }}" method="GET" style="display:inline-block;">
                                        <button onclick="return confirm('Anda yakin ?')" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>

                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <div id="mapid" style="margin-left: 40px; width: 95%; height: 400px;"></div>

                    <script>
                        var mymap = L.map('mapid', {minZoom: 0,maxZoom: 15}).setView([-4.907389, 115.169578], 4);

                        L.control.scale().addTo(mymap);

                        var myStyle = {
                            "color": "#000",
                            "weight": 1,
                            "opacity": 0.65
                        };

                        mymap.on('dblclick', function(e){
                            var coord = e.latlng;
                            var lat = coord.lat;
                            var lng = coord.lng;

                            document.getElementById("x").value = lat;
                            document.getElementById("y").value = lng;
                            $('#modalPrimary').modal('show');
                        });

                        var serviceUrl ='http://localhost:8080/geoserver/mx/ows'; 
                        function getColor(d) {
                            return d > 4000 ? '#7f2704' :
                                    d > 3000  ? '#b83c02' :
                                    d > 2000  ? '#e6590a' :
                                    d > 1000  ? '#f97f2b' :
                                    d > 500   ? '#fda45d' :
                                    d > 100   ? '#fdca97' :
                                    d > 0     ? '#fee4ca' :
                                                '#fff5eb';
                        }

                        var ParamMorofologi = {
                            service : 'WFS',
                            version: '1.0.0',
                            request: 'GetFeature',
                            typeName : 'mx:Morfology',
                            outputFormat: 'text/javascript',
                            format_options : 'callback:getJson',
                            SrsName : 'EPSG:4326'
                        };
                        var Morfologiparameters = L.Util.extend(ParamMorofologi);
                        var URLMorfo = serviceUrl + L.Util.getParamString(Morfologiparameters);
                        console.log(URLMorfo);
                        $.ajax({
                            type: "GET",
                            url : URLMorfo,
                            dataType : 'jsonp',
                            jsonpCallback : 'getJson',
                            async: false,
                            success : function(response){
                                L.geoJson(response, {
                                    style: function(features){  
                                        return{
                                            weight: 1,
                                            opacity: 1,
                                            color: 'white',
                                            dashArray: '3',
                                            fillOpacity: 0.7,
                                            fillColor: getColor(features.properties.ELEVASI)
                                        };
                                    }
                                }).addTo(mymap);
                            }
                        });

                        var defaultParameters = {
                            service : 'WFS',
                            version: '1.0.0',
                            request: 'GetFeature',
                            typeName : 'mx:provinsi_json',
                            outputFormat: 'text/javascript',
                            format_options : 'callback:getJson',
                            SrsName : 'EPSG:4326'
                        };
                        var parameters = L.Util.extend(defaultParameters);
                        var URL = serviceUrl + L.Util.getParamString(parameters);
                        console.log(URL);
                        $.ajax({
                            type: "GET",
                            url : URL,
                            dataType : 'jsonp',
                            jsonpCallback : 'getJson',
                            async: false,
                            success : function(response){
                                L.geoJson(response, {
                                    style: function(features){
                                        return{
                                            weight: 2,
                                            opacity: 1,
                                            color: 'black',
                                            fillOpacity: 0,
                                        };
                                    }
                                }).addTo(mymap);
                            }
                        });

                        L.geoJSON(ibukota_provinsi, {
                            pointToLayer: function(feature,latlng){
                                label = String(feature.properties.NAMA)
                                    return new L.CircleMarker(latlng, {
                                        radius: 1,
                                    }).bindTooltip(label, {permanent: true, direction: "center",className: "my-labels"}).openTooltip();
                            }
                        }).addTo(mymap).bringToFront();

                        L.polyline([
                            <?php foreach($waypoint as $item){ ?>
                                [<?php echo $item->x; ?>, <?php echo $item->y; ?>],
                            <?php } ?>
                            ],{ weight: 2, color: '#0D0C0C' }).addTo(mymap);

                        <?php 
                            foreach($waypoint as $item){
                        ?>
                            L.marker([<?php echo $item->x; ?>, <?php echo $item->y; ?>]).addTo(mymap);
                        <?php } ?>


                    </script>

                    <div class="modal fade" id="modalPrimary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <!-- <form id="form1" method="post" class="form-horizontal" action="{{ route('Waypoint.store') }}" enctype="multipart/form-data"> -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Waypoint</h5>
                                    </div>
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <section class="panel">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Nama </label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="name" id="name_waypoint" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Latitude </label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="x" class="form-control" id="x" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Longitude </label>
                                                    <div class="col-sm-6">
                                                        <input type="text" max="360" name="y" id="y" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Alt </label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="alt" id="alt_waypoint" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Speed </label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="speed" id="speed_waypoint" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Delay </label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="delay" id="delay_waypoint" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">No Urut </label>
                                                    <div class="col-sm-6">
                                                        <input type="number" min="1" max="100" name="no_urut" id="no_urut_waypoint" class="form-control" required>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="id_flight" id="id_flight_waypoint" value="{{ $id_flight }}">
                                                <input type="hidden" name="id_skenario" id="id_skenario_waypoint" value="{{ $id_skenario }}">
                                                
                                            </div>
                                            <footer class="panel-footer">
                                                <button class="btn btn-primary" onclick="simpanwaypoint();">Simpan </button>
                                            </footer>
                                        </section>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>

                     <script type="text/javascript">
                        function simpanwaypoint(){
                            var name = document.getElementById("name_waypoint").value;
                            var x = document.getElementById("x").value;
                            var y = document.getElementById("y").value;
                            var alt = document.getElementById("alt_waypoint").value;
                            var speed = document.getElementById("speed_waypoint").value;
                            var nourut = document.getElementById("no_urut_waypoint").value;
                            var delay = document.getElementById("delay_waypoint").value;
                            var id_flight = document.getElementById("id_flight_waypoint").value;
                            var id_skenario = document.getElementById("id_skenario_waypoint").value;

                            if(y > 360 || y < -360){
                                alert("Longitude tidak boleh lebih dari 360 atau -360");
                            }else{
                                $.ajax({
                                    url  : '{{ url("addWaypoint") }}',
                                    type : 'post',
                                    data: {
                                        'name': name,
                                        'x': x,
                                        'y': y,
                                        'alt': alt,
                                        'speed': speed,
                                        'no_urut': nourut,
                                        'delay': delay,
                                        'id_flight': id_flight,
                                        'id_skenario': id_skenario,
                                        '_token': '{{ csrf_token() }}'
                                    },
                                    success: function(data){
                                        if(data == 'true'){
                                            alert("Berhasil ditambah");
                                            location.reload();
                                        }else{
                                            alert("Gagal ditambah");
                                        }
                                    },
                                    error: function(error){
                                        console.log(error);  
                                    }
                                });
                                return false;
                            }
                        }
                    </script>

                    <div class="modal fade" id="editWaypoint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Waypoint</h5>
                                </div>
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <section class="panel">
                                        <div class="panel-body">
                                            @if (Session::has('danger'))
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Gagal</strong> {{ Session::get('danger') }}
                                                </div>
                                            @endif

                                            <input type="hidden" name="id" id="id">
                                            <input type="hidden" name="id_flight" id="id_flight">
                                            <input type="hidden" name="id_skenario" id="id_skenario">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="name" id="name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Latitude </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="x" class="form-control" id="x" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Longitude </label>
                                                <div class="col-sm-6">
                                                    <input type="text" max="360" name="y" id="y" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Alt </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="alt" id="alt" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Speed </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="speed" id="speed" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Delay </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="delay" id="delay" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">No Urut </label>
                                                <div class="col-sm-6">
                                                    <input type="number" min="1" max="100" name="no_urut" id="no_urut" class="form-control" required>
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
                            var x = $(this).data('x');
                            var y = $(this).data('y');
                            var alt = $(this).data('alt');
                            var speed = $(this).data('speed');
                            var name = $(this).data('name');
                            var nourut = $(this).data('nourut');
                            var delay = $(this).data('delay');
                            var id_flight = $(this).data('idflight');
                            var id_skenario = $(this).data('idskenario');

                            $(".modal-body #id").val( id );
                            $(".modal-body #name").val( name );
                            $(".modal-body #x").val( x );
                            $(".modal-body #y").val( y );
                            $(".modal-body #alt").val( alt );
                            $(".modal-body #speed").val( speed );
                            $(".modal-body #no_urut").val( nourut );
                            $(".modal-body #delay").val( delay );
                            $(".modal-body #id_flight").val( id_flight );
                            $(".modal-body #id_skenario").val( id_skenario );
                        });

                        function simpanperubahan(){
                            var id = document.getElementById("id").value;
                            var name = document.getElementById("name").value;
                            var x = document.getElementById("x").value;
                            var y = document.getElementById("y").value;
                            var alt = document.getElementById("alt").value;
                            var speed = document.getElementById("speed").value;
                            var nourut = document.getElementById("no_urut").value;
                            var delay = document.getElementById("delay").value;
                            var id_flight = document.getElementById("id_flight").value;
                            var id_skenario = document.getElementById("id_skenario").value;

                            if(y > 360 ){
                                alert("Longitude tidak boleh lebih dari 360");
                            }else{
                                $.ajax({
                                    url  : '{{ url("updateWaypoint") }}',
                                    type : 'post',
                                    data: {
                                        'id': id,
                                        'name': name,
                                        'x': x,
                                        'y': y,
                                        'alt': alt,
                                        'speed': speed,
                                        'no_urut': nourut,
                                        'delay': delay,
                                        'id_flight': id_flight,
                                        'id_skenario': id_skenario,
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
                            
                        }
                    </script>

                </div>
            </div>
        </div>
    </section>
@endsection