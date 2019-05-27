<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Login;

class LoginController extends Controller
{
    public function index(){
    	if(!Session::get('email')){
            return view('layouts/login/index');
        }else{
            return redirect('/')->with('alert','Anda sudah logout');
        }
    }

    public function in(Request $request){
    	$email = $request->email;
        $password = md5($request->password);

        $data = Login::where('username',$email)
        					->where('password',$password)
        					->first();
        if($data){
        	Session::put('email',$data->email);
            Session::put('username',$data->username);
            Session::put('login',TRUE);
            return redirect('/Skenario');
        }else{
        	return redirect('/')->with('alert','Username atau Password, Salah !');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('success','Anda sudah logout');
    }
}
