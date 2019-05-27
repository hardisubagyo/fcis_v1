<?php

namespace App\Http\Middleware;

use Closure;

class Cekstatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(!$request->session()->exists('email')){
            return redirect('/')->with('alert','Silahkan login terlebih dahulu !');;
        }

        return $next($request);
    }
}
