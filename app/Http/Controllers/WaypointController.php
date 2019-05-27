<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Skenario;
use App\Models\Flight;
use App\Models\Route;
use App\Models\Waypoint;

class WaypointController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekstatus');
    }

    public function waypoint($idm,$id){
        $skenario = Skenario::find($idm);
        $flight = Flight::where('id_skenario', $idm)->get();
    	$waypoint = Waypoint::where('id_flight', $id)->orderBy('no_urut', 'ASC')->get();
        $get = Flight::find($id);
    	return view('layouts/waypoint/index',['get' => $get, 'id_flight' => $id, 'waypoint' => $waypoint, 'flight' => $flight, 'skenario' => $skenario, 'id_skenario' => $idm]);
    }

    public function create($id){
        $route = Route::where('id', $id)->first();
    	return view('layouts/waypoint/tambah',['id_route' => $id, 'route' => $route]);
    }

    public function store(Request $request){

		$data= new Waypoint();
	    $data->x=$request->get('x');
	    $data->y=$request->get('y');
	    $data->alt=$request->get('alt');
	    $data->speed=$request->get('speed');
	    $data->delay=$request->get('delay');
	    $data->name=$request->get('name');
        $data->id_flight=$request->get('id_flight');
        $data->id_skenario=$request->get('id_skenario');
        $data->no_urut=$request->get('no_urut');

	    $data->save();
	    return redirect('/showWaypoint/'.$request->get('id_skenario').'/'.$request->get('id_flight'))->with('success', 'Waypoint berhasil tersimpan');
    }

    public function destroy($id){
    	$data= Waypoint::find($id);
        Waypoint::find($id)->delete();
        return redirect('/showWaypoint/'.$data->id_skenario.'/'.$data->id_flight)->with('success', 'Waypoint berhasil dihapus');
    }

    public function update(Request $request){
        $id = $request->input('id');
        $data= Waypoint::find($id);
        $data->name=$request->input('name');
        $data->x=$request->input('x');
        $data->y=$request->input('y');
        $data->alt=$request->input('alt');
        $data->speed=$request->input('speed');
        $data->no_urut=$request->input('no_urut');
        $data->delay=$request->input('delay');
        
        $request = $data->save();

        echo json_encode($request);
    }

    public function addwaypoint(Request $request){
        $data= new Waypoint();
        $data->x=$request->input('x');
        $data->y=$request->input('y');
        $data->alt=$request->input('alt');
        $data->speed=$request->input('speed');
        $data->delay=$request->input('delay');
        $data->name=$request->input('name');
        $data->id_flight=$request->input('id_flight');
        $data->id_skenario=$request->input('id_skenario');
        $data->no_urut=$request->input('no_urut');
        $request = $data->save();
        echo json_encode($request);
    }
}
