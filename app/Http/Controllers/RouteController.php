<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Skenario;
use App\Models\Flight;
use App\Models\Route;


class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekstatus');
    }

    public function route($id){
    	$route = Route::where('id_flight', $id)->get();
        $flight = Flight::find($id);
        $skenario = DB::table('flight')
                        ->select('flight.id_skenario','scenario.nama')
                        ->join('scenario', 'scenario.id', '=', 'flight.id_skenario')
                        ->where('flight.id', $id)
                        ->first();

    	return view('layouts/route/index',['route' => $route, 'id_flight' => $id, 'flight' => $flight, 'skenario' => $skenario]);
    }

    public function create($id){
        $skenario = DB::table('flight')
                        ->select('flight.id_skenario','scenario.nama')
                        ->join('scenario', 'scenario.id', '=', 'flight.id_skenario')
                        ->where('flight.id', $id)
                        ->first();
    	return view('layouts/route/tambah',['id_flight' => $id, 'skenario' => $skenario]);
    }

    public function store(Request $request){
	
		$data= new Route();
	    $data->id_flight=$request->get('id_flight');
	    $data->name=$request->get('name');
        $data->id_skenario=$request->get('id_skenario');
	    $data->save();

	    return redirect('/showRoute/'.$request->get('id_flight'))->with('success', 'Route berhasil tersimpan');
    }

    public function edit($id){
        $data = Route::find($id);
        return view('layouts/route/edit', ['data' => $data]);
    }

    public function update(Request $request, $id){
       
        $data= Route::find($id);
        $data->id_flight=$request->get('id_flight');
        $data->name=$request->get('name');
        $data->save();
        return redirect('/showRoute/'.$request->get('id_flight'))->with('success', 'Route berhasil diubah');
    }

    public function destroy($id){
        $data= Route::find($id);

        DB::table('route')->where(['id'=>$id,])->delete();
        DB::table('waypoint')->where(['id_route'=>$id,])->delete();

        return redirect('/showRoute/'.$data->id_flight)->with('success', 'Route berhasil dihapus');
    }
}
