<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Login;

class UsersController extends Controller
{	
	public function __construct()
    {
        $this->middleware('cekstatus');
    }
    
    public function index(){
    	$login = Login::all();
    	return view('layouts/users/index', ['login' => $login]);
    }

    public function create(){
    	return view('layouts/users/tambah');	
    }

    public function store(Request $request){

    	if($request->get('password') != $request->get('repassword')){
    		return redirect('/createUsers')->with('danger', 'Password tidak sama');
    	}else{
    		$data= new Login();
		    $data->name=$request->get('nama');
		    $data->email=$request->get('email');
            $data->username=$request->get('username');
		    $data->password=md5($request->get('password'));
		    $data->save();

		    return redirect('/Users')->with('success', 'Pengguna berhasil tersimpan');
    	}
    }

    public function edit($id){
        $data = Login::find($id);
        return view('layouts/users/edit', ['data' => $data]);
    }

    public function update(Request $request, $id){

       	if($request->get('password') != $request->get('repassword')){
    		return redirect('/editUsers/'.$id)->with('danger', 'Password tidak sama');
    	}else{
		    $data= Login::find($id);
            if($request->get('password') != ''){
            	$data->name=$request->get('nama');
			    $data->email=$request->get('email');
                $data->username=$request->get('username');
            }else{
            	$data->name=$request->get('nama');
			    $data->email=$request->get('email');
                $data->username=$request->get('username');
			    $data->password=md5($request->get('password'));
            }

            $data->save();
		    return redirect('/Users')->with('success', 'Pengguna berhasil diubah');
        }
    }

    public function destroy($id){
        Login::find($id)->delete();
        return redirect('/Users')->with('success', 'Pengguna berhasil dihapus');
    }
}
