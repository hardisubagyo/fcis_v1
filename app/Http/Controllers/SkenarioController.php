<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Skenario;

class SkenarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekstatus');
    }
    
    public function index(){
    	$skenario = Skenario::all();
    	return view('layouts/skenario/index', ['skenario' => $skenario]);
    }

    public function create(){
        $max = DB::table('scenario')->max('id');
    	return view('layouts/skenario/tambah', ['max' => $max]);	
    }

    public function store(Request $request){
		$data= new Skenario();
        $data->id=$request->get('max');
	    $data->nama=$request->get('nama');
	    $data->save();

	    return redirect('/showFlight/'.$request->get('max'))->with('success', 'Skenario berhasil tersimpan');
    }

    public function edit($id){
        $data = Skenario::find($id);
        return view('layouts/skenario/edit', ['data' => $data]);
    }

    public function update(Request $request, $id){
       
	    $data= Skenario::find($id);
        $data->nama=$request->get('nama');
        $data->save();
	    return redirect('/Skenario')->with('success', 'Skenario berhasil diubah');
    }

    public function destroy($id){

        DB::table('scenario')->where(['id'=>$id,])->delete();
        DB::table('flight')->where(['id_skenario'=>$id,])->delete();
        DB::table('waypoint')->where(['id_skenario'=>$id,])->delete();
        
        return redirect('/Skenario')->with('success', 'Skenario berhasil dihapus');
    }
}
