<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Skenario;
use App\Models\Flight;

class FlightController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekstatus');
    }

    public function flight($id){
    	$skenario = Skenario::find($id);
    	$flight = Flight::where('id_skenario', $id)->get();

    	return view('layouts/flight/index',['skenario' => $skenario, 'flight' => $flight]);
    }

    public function create($id){
    	return view('layouts/flight/tambah',['id_skenario' => $id]);
    }

    public function store(Request $request){
	
		$data= new Flight();
	    $data->id_skenario=$request->input('id_skenario');
	    $data->callsign=$request->input('callsign');
	    $data->delay=$request->input('delay');
        $data->rute=$request->input('rute');
	    $result = $data->save();

        echo json_encode($result);

	    /*return redirect('/showFlight/'.$request->get('id_skenario'))->with('success', 'Flight berhasil tersimpan');*/
    }

    public function edit($id){
        $data = Flight::find($id);
        return view('layouts/flight/edit', ['data' => $data]);
    }

    public function update(Request $request, $id){
       
	    $data= Flight::find($id);
        $data->id_skenario=$request->get('id_skenario');
	    $data->callsign=$request->get('callsign');
	    $data->delay=$request->get('delay');
        $data->save();
	    return redirect('/showFlight/'.$request->get('id_skenario'))->with('success', 'Flight berhasil diubah');
    }

    public function destroy($id){
    	$data= Flight::find($id);

        DB::table('flight')->where(['id'=>$id,])->delete();
        DB::table('waypoint')->where(['id_flight'=>$id,])->delete();

        return redirect('/showFlight/'.$data->id_skenario)->with('success', 'Skenario berhasil dihapus');
    }

    public function updateflight(Request $request){
        $id = $request->input('id');
        $data= Flight::find($id);
        $data->callsign=$request->input('callsign');
        $data->delay=$request->input('delay');
        $data->rute=$request->input('rute');
        $data->id_skenario=$request->input('idskenario');
        
        $request = $data->save();

        echo json_encode($request);
    }
}
